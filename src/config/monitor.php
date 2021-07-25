<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Log Configuration
    |--------------------------------------------------------------------------
    | Description will be written after the package will be released.
    |
    */

    'API_KEY'   => '',

    'limitation'    => [
        'archives'  => 2000,
        'archives'  => 'all',
    ],

    'lang'  => 'en',

    'period'  => 5,

    'sms' => [
        'enabled'   => true,
        'drivers'    => [
            'kavenegar' => [
                'enabled'   => true,
                'API_KEY'   => ''
            ],
            // 'others'    => [
            //     'enabled'   => true,
            //     'API_KEY'   => ''
            // ]
        ]
    ],

    'mail'  => [
        'enabled'   => true,
        'theme'     => [
            'direction' => 'ltr',
            'color'     => 'red' // also you can use RGBa, RGB and HEX code
        ]
    ],

    'users' => [
        'client'   => [
            'env'           => 'production',
            'name'          => '',
            'email'         => '',
            'tell'          => '',
            'direction'     => 'rtl', // optional, will be overwritten on mail.theme.direction
            'color'         => 'green', // optional, will be overwritten on mail.color.direction
            'lang'          => 'fa', // optional, will be overwritten on lang
            'period'        => 10, // optional, will be overwritten on report_count
            'sms'           => false, // optional, will be overwritten on sms.enabled
            'mail'          => false // optional, will be overwritten on mail.enabled
        ],
    
        'dev'  => [
            'env'   => 'development',
            'name'  => '',
            'email' => '',
            'tell'  => ''
        ]
    ]

];
