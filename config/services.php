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
    
    'paypal' => [
	'client_id' => 'AZw1NgvvQUNifA8S-PpAT2RnlrpXfa8jYjS1GfjaDJc85fhElRPzp8t5UhleRFjPLF9maYb7IrwbX6A5',
	'secret' => 'EETiK9vhgGBLW4P9t0a7AANVVpVkMkmFfZK7-JnUfCicMDfhtzWye_Vljr4uRDzNlgFMxJ_bKcaDT9aj',
],

];
