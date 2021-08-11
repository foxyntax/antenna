<?php
namespace Foxyntax\Antena\App\Interfaces;


interface DriverRegisteration {
    
    /**
     ** Register the SMS package that you want to use it on antenna package
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