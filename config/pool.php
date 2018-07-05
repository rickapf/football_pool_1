<?php

return [

    'admin' => [
        'phone' => env('ADMIN_PHONE', '15165283123'),
        'name'  => env('ADMIN_NAME', 'Patrick'),
    ],

    'reset_password_link' => [
        'expire' => '1 hour'
    ],

    'cache' => [
        'keys' => [
            'user_dropdown' => 'user_dropdown'
        ]
    ]

];