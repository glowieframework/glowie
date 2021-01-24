<?php

    /*
        --------------------------------
        Application index
        --------------------------------
        This file is responsible for starting your application.
        It also handles all URI requests and send them to Glowie router.

        ---------------------------------------------
        We do not recommend editing below this line.
        ---------------------------------------------
    */

    // Store application starting time
    $glowieTimer = microtime(true);

    // Check minimum PHP version
    if (version_compare(phpversion(), '7.4.9', '<')) {
        die('<strong>Unsupported PHP version!</strong><br>
            Glowie requires PHP version 7.4.9 or higher, you are using ' . phpversion() . '.');
    }

    // Check configuration file
    if(!file_exists('config/Config.php')){
        die('<strong>Configuration file not found!</strong><br>
            Please rename "app/config/Config.example.php" to "app/config/Config.php".');
    }

    // Setup Glowie application and environment
    require_once('../library/bootstrap.php');
    
    // Check configuration environment
    if(empty($glowieConfig[getenv('GLOWIE_ENV')])){
        die('<strong>Invalid configuration environment!</strong><br>
            Please check your application settings.');
    }

    // Setup configuration environment
    $glowieConfig = $glowieConfig[getenv('GLOWIE_ENV')];

    // Initialize application
    $app = new Glowie\Rails();
    $app->init();
    
?>