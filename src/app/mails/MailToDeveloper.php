<?php

namespace Foxyntax\Monitoring\App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
            'lang'  => config('monitor.lang'),
            'client'=> config('monitor.client')
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
        return $this->view('emails.fx_development')
                    ->with([
                        'role'  => $this->role,
                        'client'=> $this->config['client'],
                        'time'  => $this->time,
                        'logs'  => $this->logs
                    ]);
    }
}