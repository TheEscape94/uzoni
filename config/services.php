<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '227762080982175',
        'client_secret' => '39c55a3c929611acfac302fe55bd4f20',
        'redirect' => 'https://www.uzoni.rs/socialCallback/facebook',
    ],

    'google' => [
        'client_id' => '975756286977-bh70vapop7plevg22b5lngbhg0smfkeg.apps.googleusercontent.com',
        'client_secret' => 'LEhITGIqsOmPlcAAaKOsTAPh',
        'redirect' => 'https://www.uzoni.rs/socialCallback/google',
    ],
];
