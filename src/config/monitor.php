<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Log Configuration
    |--------------------------------------------------------------------------
    | Description will be written after the package will released.
    |
    */

    'client_log' => [
        'enabled'       => false,
        'client_name'   => '',
        'mail'          => '',
        'tell'          => '',
        'lang'          => 'en', // or fa
    ],

    'dev_log' => [
        'API_KEY'       => '',
        'route'         => '/get-logs', // return /monitor/get-logs in routes
        'organization'  => 'foxyntax',
        'lang'          => 'en', // or fa
    ],

    'type' => [
        'mail'  => [
            'enabled'   => true,
            'address'   => 'foxyntax@gmail.com',
            'period'    => 1, // based on day 

            'theme'     => [
                'direction' => 'ltr',
                'color'     => 'red' // also you can use RGBa, RGB and HEX code
            ]
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
