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
        'archives'      => 2000,
        'allowed_role'  => null
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
            'direction' => 'ltr'
        ]
    ],

    'developer' => 'dev',
    'client'    => 'client',

    'roles' => [
        'client'   => [
            'env'           => 'client',
            'name'          => '',
            'email'         => '',
            'tell'          => '',
            'direction'     => 'rtl', // optional, will be overwritten on mail.theme.direction
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
