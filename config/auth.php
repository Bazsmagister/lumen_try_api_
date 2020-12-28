<?php

// lol. this is in https://jwt-auth.readthedocs.io/en/stable/quick-start/
//but need return and an array...

// 'defaults' => [
//     'guard' => 'api',
//     'passwords' => 'users',
// ],

// 'guards' => [
//     'api' => [
//         'driver' => 'jwt',
//         'provider' => 'users',
//     ],
// ],


//working solution:
//https://dev.to/ndiecodes/build-a-jwt-authenticated-api-with-lumen-2afm?fbclid=IwAR0aTMjhDXOj7UXdOeUrk7Y_yrZfIAYdHll5uLBE2hcd_iD8jWXpMSd1bIE

return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\User::class
        ]
    ]
];
