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
     ** Send a sms based on development enironment
     * 
     * @param integer
     * @return boolean
     */
    public function send_for_developer(object $config, object $data) : boolean;


    /**
     ** Send a sms based on production enironment
     * 
     * @param integer
     * @return boolean
     */
    public function send_for_users(object $config, object $data) : boolean;

}