<?php

return [

    'admin' => [
        'phone' => env('ADMIN_PHONE'),
        'name'  => env('ADMIN_NAME'),
        'email' => env('ADMIN_EMAIL')
    ],

    'reset_password_link' => [
        'expire' => '1 hour'
    ],

    'cache' => [
        'keys' => [
            'user_dropdown' => 'user_dropdown'
        ]
    ],

    'profootballapi' => [
        'base_url'    => env('PF_API_BASE_URL'),
        'key'         => env('PF_API_KEY'),
        'year'        => env('PF_API_YEAR'),
        'season_type' => env('PF_API_SEASON_TYPE')
    ]

];