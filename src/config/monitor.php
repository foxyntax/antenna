<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Log Config
    |--------------------------------------------------------------------------
    | Description will be written after the package will released.
    |
    */

    'client_log' => [
        'enabled'   => false,
        'mail'      => '',
        'tell'      => '',
        'name'      => '',
        'lang'      => 'en', // or fa
        'period'    => 1
    ],

    'dev_log' => [
        'API_KEY'       => '',
        'route'         => '/get-logs', // return /monitor/get-logs in routes
        'organization'  => 'foxyntax',
        'lang'          => 'en', // or fa

        'mail'  => [
            'enabled'   => true,
            'address'   => 'foxyntax@gmail.com',
            'period'    => 1, // based on day 
        ],

        'sms'   => [
            'enabled'   => false,
            'tell'      => '09361719209',
            'period'    => 1,

            'driver'   => [
                'kavenegar' => [
                    'enabled'   => true,
                    'API_KEY'   => ''
                ],
                // 'others'    => [
                //     'enabled'   => true,
                //     'API_KEY'   => ''
                // ]
            ]
        ]
    ]

];
