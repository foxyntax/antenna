<?php

namespace Foxyntax\Antenna\App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToDeveloper extends Mailable
{
    use Queueable, SerializesModels;

    /**
     ** The logs 
     * 
     * @var array
     */
    protected $logs;

    /**
     ** Allowed role 
     * 
     * @var array
     */
    protected $role;

    /**
     ** Reported time
     * 
     * @var array
     */
    protected $time;
    
    /**
     ** The configuration 
     * 
     * @var array
     */
    protected $config;


    /**
     ** Creating configuraiton instance 
     * 
     * @return void
     */
    public function __cunstruct(string $logs, array $role)
    {
        $this->logs = $logs;
        $this->time = $time;
        $this->role = $role;
        $this->config = [
            'lang'  => config('antenna.lang'),
            'client'=> config('antenna.client')
        ];
    }

    /**
     ** Mail a development env type report
     * 
     * @param string $log
     * @param array $roles
     * @return $this
     */
    public function build()
    {
        $this->set_locale($name);
        return $this->view('emails.fx_development')
                    ->with([
                        'role'  => $this->role,
                        'client'=> $this->config['client'],
                        'time'  => $this->time,
                        'logs'  => $this->logs
                    ]);
    }

    /**
     * ---------------------------------------------------------------------------------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     **---------------------------------------------------- Protected Functions --------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     * ---------------------------------------------------------------------------------------------------------------------------
     */

    /**
     ** Set locale from configuration
     * 
     */
    protected function set_locale()
    {
        if (isset($this->role['lang'])) {
            App::setLocale($this->role['lang']);
        } else {
            App::setLocale($this->config['lang']);
        }
    }
}
