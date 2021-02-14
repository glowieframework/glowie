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

    // Load Composer dependencies
    require_once('../../vendor/autoload.php');

    // Run Glowie bootstrapper
    $app = new Glowie\Application();
    $app->run();
    
?>