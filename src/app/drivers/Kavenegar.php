<?php

namespace Foxyntax\Antenna\App\Drivers;

use Foxyntax\Antenna\Interfaces\DriverRegisteration;
use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class Kavenegar implements DriverRegisteration {


    /**
     ** Kavenegar API instance
     * 
     * @var \Kavenegar\KavenegarApi
     */
    protected $api;


    /**
     ** Kavenegar sender
     * 
     * @var $sender
     */
    protected $sender;



    /**
     ** Register the SMS package that you want to use it on antenna package
     *
     * @return null 
     */
    public function register()
    {
        $config = config('antenna.sms.drivers');
        $this->api = new KavenegarApi($config['kavenegar']['API_KEY']);
        $this->sender = $config['kavenegar']['sender'];
    }

    /**
     ** Send a SMS based
     * 
     * @param array $config
     * @param string $message
     */
    public function send(array $config, string $message)
    {
        try {
            $this->register();
            $this->api->send($config['tell'], $message, $this->sender);
        }
        catch(ApiException $e){
            return response()->json($e->errorMessage(), 412);
        }
        catch(HttpException $e){
            return response()->json($e->errorMessage(), 412);
        }
    }
}