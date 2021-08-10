<?php
namespace Foxyntax\Monitoring\App\Interfaces;


interface DriverRegisteration {
    
    /**
     ** Register the SMS package that you want to use it on monitoring package
     *
     * @return null 
     */
    public function register();


    /**
     ** Send a sms
     * 
     * @param array $config
     * @param string $message
     */
    public function send(array $config, string $message);


}