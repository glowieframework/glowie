<?php
    use Glowie\Core\Application;

    /*
        --------------------------------
        Application index
        --------------------------------
        This file is responsible for loading Composer packages and running Glowie bootstrapper.

        ---------------------------------------------
        We do not recommend editing below this line.
        ---------------------------------------------
    */

    // Load Composer packages
    require_once('../../vendor/autoload.php');

    // Run Glowie bootstrapper
    $app = new Application();
    $app->run();
    
?>