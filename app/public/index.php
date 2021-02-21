<?php

    /*
        --------------------------------
        Application index
        --------------------------------
        This file is responsible for loading Composer dependencies and running Glowie bootstrapper.

        ---------------------------------------------
        We do not recommend editing below this line.
        ---------------------------------------------
    */

    // Check minimum PHP version
    if (version_compare(phpversion(), '7.4.9', '<')) {
        die('<strong>Unsupported PHP version!</strong><br>
        Glowie requires PHP version 7.4.9 or higher, you are using ' . phpversion() . '.');
    }

    // Load Composer dependencies
    require_once('../../vendor/autoload.php');

    // Run Glowie bootstrapper
    $app = new Glowie\Application();
    $app->run();
    
?>