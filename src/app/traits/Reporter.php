<?php

namespace Foxyntax\Antena\App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Foxyntax\Antena\App\Mails\MailToDeveloper;
use Foxyntax\Antena\App\Services\MailLogService;
use Foxyntax\Antena\App\Models\FxMonitoringReports;

trait Reporter {

    /**
     ** The log that has been sent 
     * 
     * @var string
     */
    protected $log;
    
    /**
     ** Sender mode 
     * 
     * @var bool
     */
    protected $immediately;

    /**
     ** The configuration 
     * 
     * @var array
     */
    protected $config;

    /**
     ** The current time instance.
     *
     * @var Carbon\Carbon
     */
    protected $time;

    /**
     ** Allowed roles based on requested roles and sometimes based on latest reports for each one.
     *
     * @var array
     */
    protected $allowed_roles;


    
    /**
     ** Report bugs to users
     * 
     * @param string $log
     * @param bool $immediately
     * @param mixed $role
     * @return void
     */
    protected function report(string $log = null, bool $immediately = false, mixed $role = null)
    {
        $this->log = $log;
        $this->$immediately = $immediately;
        $this->get_configuration();

        if (is_string($role)) {

            $role = explode(',', $role);

        }

        $this->get_requested_roles($role);
        
        if (!$immediately) {

            $this->get_allowed_roles();

        }
        
        $this->send();
    }

    /**
     ** Register all antenna configuration
     * 
     * @return void
     */
    protected function get_configuration() : void
    {
        $this->config = [
            'API_KEY'   => config('antenna.API_KEY'),
            'limitation'=> config('antenna.limitation'),
            'period'    => config('antenna.period'),
            'roles'     => config('antenna.roles')
        ];
    }

    /**
     ** Get requested roles
     * 
     * @param string $role
     * @return void
     */
    protected function get_requested_roles(mixed $role) : void
    {
        // Get role types
        $roles_types = array_keys($this->config['roles']);

        // remove all types that we don't need to have
        if (! is_null($role)) {
            $this->allowed_roles = array_diff($role_types, $role);
        } else {
            $this->allowed_roles = array_diff($role_types, $this->config['limitation']['allowed_role']);
        }
    }

    /**
     ** Get allowed roles based on latest reports 
     * 
     * @return void
     */
    protected function get_allowed_roles() : void
    {
        $this->time = Carbon::now('Asia/Tehran');

        // Get the latest reports for each user and allow to send reports if they are qualified
        $roles = [];
        foreach ($this->allowed_roles as $name) {
            $latest_report = FxMonitoringReports::where('role_type', $name)
                                                        ->latest()
                                                        ->first();

            $period = (isset($this->config['roles'][$latest_report->role_type]['period'])) 
                ? $this->config['roles'][$latest_report->role_type]['period']
                : $this->config['period'];

            if (Carbon::parse($latest_report->created_at)->timestamp + ($period * 3600) >= Carbon::parse($this->time)->timestamp) {
                array_push($roles, $latest_report->role_type);
            }
        }

        // Renew $this->allowed_roles based on latest reports
        $this->allowed_roles = $roles;
    }

    /**
     ** Send reports to each allowed roles 
     * 
     * @return void
     */
    protected function send() : void
    {
        foreach ($this->allowed_roles as $name) {

            $sms_enabled = (isset($this->config['roles'][$name]['sms'])) 
                ? $this->config['roles'][$name]['sms']
                : $this->config['sms']['enabled'];

            $mail_enabled = (isset($this->config['roles'][$name]['mail'])) 
                ? $this->config['roles'][$name]['mail']
                : $this->config['mail']['enabled'];

            // Send log(s) if it's enabled
            if ($sms_enabled) {
            
                SMSLogService::sms($this->log, $this->allowed_roles);
            
            }

            // Mail log(s) if it's enabled
            if ($mail_enabled) {
                
                MailLogService::mail($this->log, $this->allowed_roles, Carbon::parse($this->time)->format('H:i'));

            }

            // Save log as a report, if it hasn't high priority
            if (! $this->immediately) {

                $env_conf = $this->config['roles'][$name]['env'];
                $env = (isset($this->config['roles'][$name]['env']) && ($env_conf === 'client' || $env_conf === 'development'))
                    ? $env_conf
                    : 'client';
                $this->save_report($name, $env);

            }

        }
    }


    /**
     ** Save report for a role
     * 
     * @param string $name
     * @param string $env
     * @return void
     */
    protected function save_report(string $name, string $env) : void
    {
 
        $new_report = new FxMonitoringReports();
        $new_report->role_type = $name;
        $new_report->env = $name;
        $new_report->send_at = $this->time;
        $new_report->save();
 
    }

}