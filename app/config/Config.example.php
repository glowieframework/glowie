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
        // Application cache
        'cache' => false,

        // Application timezone
        'timezone' => 'America/Sao_Paulo',

        // Error reporting level
        'error_reporting' => E_ALL,

        // Error logging
        'error_log' => true,

        // Key used for encryption
        'api_key' => 'f08e8ba131c7abab97dba275fab5a85e',

        // Token used for encryption
        'api_token' => 'd147723d9e91340d9dd28fbd5a0b6651',

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
        // Application cache
        'cache' => true,

        // Application timezone
        'timezone' => 'America/Sao_Paulo',

        // Error reporting level
        'error_reporting' => 0,

        // Error logging
        'error_log' => true,

        // Key used for encryption
        'api_key' => 'f08e8ba131c7abab97dba275fab5a85e',

        // Token used for encryption
        'api_token' => 'd147723d9e91340d9dd28fbd5a0b6651',

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