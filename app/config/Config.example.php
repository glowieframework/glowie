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

    $glowieConfig['development'] = array(
        // Application cache
        'cache' => false,

        // Application timezone
        'timezone' => 'America/Sao_Paulo',

        // Error reporting level
        'error_reporting' => E_ALL,

        // Key used for encryption
        'api_key' => 'Rj1UQHJfajlLKGN1WjhQYXBcSy4=',

        // Token used for encryption
        'api_token' => 'ckVdU3g3fkQmS0h0KyotTV1YdSs=',

        // Database connection settings
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

    $glowieConfig['production'] = array(
        // Application cache
        'cache' => true,

        // Application timezone
        'timezone' => 'America/Sao_Paulo',

        // Error reporting level
        'error_reporting' => 0,

        // Key used for encryption
        'api_key' => 'Rj1UQHJfajlLKGN1WjhQYXBcSy4=',

        // Token used for encryption
        'api_token' => 'ckVdU3g3fkQmS0h0KyotTV1YdSs=',

        // Database connection settings
        'database' => [
            'host' => 'localhost',
            'username' => 'user',
            'password' => '123',
            'db' => 'glowie',
            'port' => 3306
        ]
    );

    # Remember: you can create as many environments as you want to.

?>