<?php

    /*
        --------------------------------
        Application configuration
        --------------------------------
        In this file you can define your application configuration for the current environment.
        Be sure to copy this file to 'app/config/Config.php' before starting.

        ---------------------------------------------------------------------------------------------------------------
        WARNING: This file should not be commited to your application source control as it may contain sensitive data.
        ---------------------------------------------------------------------------------------------------------------
    */

    return [

        // Application maintenance mode
        'maintenance' => [

            // Enable maintenance mode
            'enabled' => false,

            // Maintenance mode bypass key
            'bypass_key' => '470c054cfc6780df66bf3922eddbd883'

        ],

        // Skeltch templating engine
        'skeltch' => [

            // Enable Skeltch compiler
            'enabled' => true,

            // Enable views caching
            'cache' => true

        ],

        // Application error reporting
        'error_reporting' => [

            // Error reporting level
            'level' => E_ALL,

            // Enable error logging
            'logging' => true

        ],

        // Application session management
        'session' => [

            // Unused session lifetime
            'lifetime' => 120,

            // Number of requests when to run the garbage collector
            'gc_cleaning' => 50

        ],

        // Application secret keys
        'secret' => [

            // Key used in encrypting functions
            'app_key' => 'f08e8ba131c7abab97dba275fab5a85e',

            // Token used in encrypting functions
            'app_token' => 'd147723d9e91340d9dd28fbd5a0b6651'

        ],

        // Application database connection settings
        'database' => [

            // Default connection
            'default' => [
                'host' => 'localhost',
                'username' => 'root',
                'password' => '',
                'db' => 'glowie',
                'port' => 3306,
                'charset' => 'utf8'
            ]

        ],

        // Application miscellaneous settings
        'other' => [

            // Default timezone
            'timezone' => 'America/Sao_Paulo'

        ]

    ];

?>