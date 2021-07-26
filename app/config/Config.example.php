<?php

    /*
        --------------------------------
        Application configuration
        --------------------------------
        In this file you can define your application configuration for each environment.
        Be sure to rename this file to 'Config.php' before starting.

        ---------------------------------------------------------------------------------------------------------------
        WARNING: This file should not be commited to your application source control as it may contain sensitive data.
        ---------------------------------------------------------------------------------------------------------------
    */

    # ------------------------
    # Development environment
    # ------------------------

    $config['development'] = array(
        // Enable application cache
        'cache' => false,

        // Use Skeltch templating engine
        'skeltch' => true,

        // Application default timezone
        'timezone' => 'America/Sao_Paulo',

        // Error reporting level
        'error_reporting' => E_ALL,

        // Enable error logging
        'error_log' => true,

        // Key used in encrypting functions
        'app_key' => 'f08e8ba131c7abab97dba275fab5a85e',

        // Token used in encrypting functions
        'app_token' => 'd147723d9e91340d9dd28fbd5a0b6651',

        // Default database connection settings
        'database' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'db' => 'glowie',
            'port' => 3306
        ]
    );

    # -----------------------
    # Production environment
    # -----------------------

    $config['production'] = array(
        // Enable application cache
        'cache' => true,

        // Use Skeltch templating engine
        'skeltch' => true,

        // Application default timezone
        'timezone' => 'America/Sao_Paulo',

        // Error reporting level
        'error_reporting' => 0,

        // Enable error logging
        'error_log' => true,

        // Key used in encrypting functions
        'app_key' => 'f08e8ba131c7abab97dba275fab5a85e',

        // Token used in encrypting functions
        'app_token' => 'd147723d9e91340d9dd28fbd5a0b6651',

        // Default database connection settings
        'database' => [
            'host' => 'localhost',
            'username' => 'user',
            'password' => '123',
            'db' => 'glowie',
            'port' => 3306
        ]
    );

    // Remember: you can create as many environments as you want to.

?>