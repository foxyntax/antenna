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
        'activated' => 'kavenegar',
        'drivers'    => [
            'kavenegar' => [
                'API_KEY'   => '',
                'sender'    => ''
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
            'name'  => 'Milad',
            'email' => 'milad1995honor@gmail.com',
            'tell'  => '09156284764',
            'sms'   => true,
            'mail'  => false
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Maps
    |--------------------------------------------------------------------------
    |
    | This is the array of Classes that maps to Drivers above.
    | You can create your own driver if you like and add the
    | config in the drivers array and the class to use for
    | here with the same name. You will have to implement
    | Foxyntax\Antena\App\Interfaces\DriverRegisteration .
    */
    'map' => [
        'kavenegar' => \Foxyntax\Antena\App\Drivers\Kavenegar::class,
    ]

];
