<?php

namespace Foxyntax\Antena\App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Foxyntax\Antena\App\Models\FxMonitoringReports;

class SMSLogService {

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
            'roles' => config('antena.roles'),
            'lang'  => config('antena.lang')
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
     * @param array $log
     * @param array $allowed_roles
     * @return void
     */
    protected function sms($logs, $allowed_roles)
    {
        $driver = $this->get_driver();

        foreach ($allowed_roles as $name) {
            $this->set_locale($name);
            $role_env = (isset($this->config['roles'][$name]['env']))
                ? $this->config['roles'][$name]['env']
                : 'client';
            
            switch ($role_env) {
                case 'development':
                    $driver->send($this->config['roles'][$name], $this->get_dev_data($this->config['roles'][$name], $logs));
                    break;
                case 'client':
                    $driver->send($this->config['roles'][$name], $this->get_cli_data($this->config['roles'][$name]));
                    break;
                default:
                    $this->log($role_env);
            }
        }
    }

    /**
     ** Get enabled driver instance from antena configuration 
     * 
     * @param array $role
     * @param array $logs
     * @return class
     */
    protected function get_driver(array $logs)
    {
        $activated_driver = config('antena.sms.activated');
        if (isset(config("antena.map")[$activated_driver])) {

            return require(config("antena.map.$activated_driver"));

        } else {

            return $this->get_default_driver();

        }
        
    }

    /**
     ** return default driver
     * 
     * @return class
     */
    protected function get_default_driver()
    {
        return require(config('antena.map.kavenegar'));
    }

    /**
     ** Set locale from configuration
     * 
     * @param string $name
     */
    protected function set_locale(string $name)
    {
        if (isset($this->config['roles'][$name]['lang'])) {
            App::setLocale($this->config['roles'][$name]['lang']);
        } else {
            App::setLocale($this->config['lang']);
        }
    }

    /**
     ** Return sentences based on localization
     * 
     * @param array $logs
     * @param array $role
     */
    protected function get_dev_data(array $logs, array $role)
    {
        $message  = __('antena::sms.title') . PHP_EOL;
        $message .= __('antena::sms.bugs', ['log-count'   => count($logs)]) . PHP_EOL . PHP_EOL;
        $message .= __('antena::sms.dev-title', ['app-name' => config('app.name')]) . PHP_EOL;

        if (isset($role['tell'])) {
            $message .= __('antena::sms.dev-tell', ['employer' => $role['tell']]) . PHP_EOL;
        }

        if (isset($role['email'])) {
            $message .= __('antena::sms.dev-tell', ['employer' => $role['tell']]) . PHP_EOL;
        }

        return $message;
    }

    /**
     ** Return sentences based on localization
     * 
     * @param array $role
     * @return string $this->data
     */
    protected function get_cli_data(array $role)
    {
        $message  = __('antena::sms.title') . PHP_EOL;
        $message .= __('antena::sms.cli-title', ['app-name' => config('app.name')]) . PHP_EOL;

        if (isset($role['tell'])) {
            $message .= __('antena::sms.dev-tell', ['developer' => $role['tell']]) . PHP_EOL;
        }

        if (isset($role['email'])) {
            $message .= __('antena::sms.dev-mail', ['developer' => $role['email']]) . PHP_EOL;
        }

        return $message;
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
        $new_content = "the environment is not defined and can\'t mail it\nthat env is $env.";
        
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