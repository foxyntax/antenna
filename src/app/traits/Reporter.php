<?php

namespace Foxyntax\Antenna\App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Foxyntax\Antenna\App\Mails\MailToDeveloper;
use Foxyntax\Antenna\App\Services\MailLogService;
use Foxyntax\Antenna\App\Models\FxAntennaReports;

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
    protected $requested_roles;


    
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

            $this->get_allowed_to_users();

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
        // 
        if (! is_null($role)) {
            $this->requested_roles = $role;
        } else {
            $this->requested_roles = array_keys($this->config['roles']);
        }
    }

    /**
     ** Get allowed roles based on latest reports 
     * 
     * @return void
     */
    protected function get_allowed_to_users() : void
    {
        $this->time = Carbon::now('Asia/Tehran');

        // Get the latest reports for each user and allow to send reports if they are qualified
        $roles = [];
        foreach ($this->requested_roles as $name) {
            $latest_report = FxAntennaReports::where('role_type', $name)
                                            ->select('created_at')
                                            ->latest()
                                            ->first();

            $period = (isset($this->config['roles'][$name]['period'])) 
                                                            ? $this->config['roles'][$name]['period']
                                                            : $this->config['period'];

            if (Carbon::parse($latest_report->created_at)->timestamp + ($period * 3600) >= Carbon::parse($this->time)->timestamp) {

                array_push($roles, $name);

            }
        }

        // Renew $this->requested_roles based on latest reports
        $this->requested_roles = $roles;
    }

    /**
     ** Send reports to each allowed roles 
     * 
     * @return void
     */
    protected function send() : void
    {
        foreach ($this->requested_roles as $name) {

            $sms_enabled = (isset($this->config['roles'][$name]['sms'])) 
                ? $this->config['roles'][$name]['sms']
                : $this->config['sms']['enabled'];

            $mail_enabled = (isset($this->config['roles'][$name]['mail'])) 
                ? $this->config['roles'][$name]['mail']
                : $this->config['mail']['enabled'];

            // Send log(s) if it's enabled
            if ($sms_enabled) {
            
                SMSLogService::sms($this->log, $this->requested_roles);
            
            }

            // Mail log(s) if it's enabled
            if ($mail_enabled) {
                
                MailLogService::mail($this->log, $this->requested_roles, Carbon::parse($this->time)->format('H:i'));

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
 
        $new_report = new FxAntennaReports();
        $new_report->role_type = $name;
        $new_report->env = $name;
        $new_report->send_at = $this->time;
        $new_report->save();
 
    }

}