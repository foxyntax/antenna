<?php

namespace Foxyntax\Monitoring\App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToClient extends Mailable
{
    use Queueable, SerializesModels;

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
    public function __cunstruct(string $log, array $role)
    {
        $this->role = $role;
        $this->time = $time;
        $this->config = [
            'lang'      => config('monitor.lang'),
            'develiper' => config('monitor.client')
        ];
    }

    /**
     ** Mail a client env type report
     * 
     * @param string $log
     * @param array $roles
     * @return $this
     */
    public function build()
    {
        App::setLocale($this->config['lang']);
        return $this->view('emails.fx_development')
                    ->with([
                        'role'  => $this->role,
                        'client'=> $this->config['developer'],
                        'time'  => $this->time,
                        'log'   => $log
                    ]);
    }
}
