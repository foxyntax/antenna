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
                    $this->log($role_env);
            }
        }
    }

    /**
     ** Append/Create new log into logs.txt 
     * 
     * @param string $env
     * @return void
     */
    protected function log(string $env)
    {
        $file_path = __DIR__ . '/../../logs/logs.txt';
        $new_content = "the environment is not defined and can't mail it\nthat env is $env.";
        
        if (file_exists($file_path)) {
            $file_content = file_get_contents($file_path);
            file_put_contents($file_path, $new_content);
        } else {
            $handle = fopen($file_path, 'w+', $new_content);
            fwrite($handle, $new_content);
            fclose($handle);
        }
    }
}
