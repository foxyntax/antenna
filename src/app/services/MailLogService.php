<?php

namespace Foxyntax\Monitoring\App\Services;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailLogService extends Mailable
{
    use Queueable, SerializesModels;

    /**
     ** The configuration 
     * 
     * @var array
     */
    protected $config;


    /**
     ** Creating configuraiton instance 
     * 
     */
    public function __cunstruct()
    {
        $this->config = [
            'roles' => config('monitor.roles')
        ];
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
     ** Send mails to allowed roles 
     * 
     * @return void
     */
    protected function mail($log, $allowed_roles, $time)
    {
        foreach ($allowed_roles as $name) {
            $role_env = (isset($this->config['roles'][$name]['env']))
                ? $this->config['roles'][$name]['env']
                : 'client';
            
            switch ($role_env) {
                case 'development':
                    Mail::to($this->config['roles'][$name]['mail'])
                        ->send(new MailToDeveloper($log, $this->config['roles'][$name], $time));
                    break;
                case 'client': 
                    Mail::to($this->config['roles'][$name]['mail'])
                        ->send(new MailToClient($this->config['roles'][$name], $time));
                    break;
                default:
                    // use log method to save log in log folder
                    break;
            }
        }
    }
}
