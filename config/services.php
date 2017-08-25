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

    'firebase' => [
      'apiKey' => 'AIzaSyC4zq49qPiFSmAjNmOSmsMvAdp5s5GLcjo',
      'authDomain' => 'ngangkot-e258e.firebaseapp.com',
      'databaseURL' => 'https://ngangkot-e258e.firebaseio.com',
      'projectId' => 'ngangkot-e258e',
      'storageBucket' => 'ngangkot-e258e.appspot.com',
      'messagingSenderId' => '430950127435',
      'dbSecreat' => 'M20aZwN6NyevMQ9FNyvScqbeYKVgyn4CP6XpZrUk'
    ]

];
