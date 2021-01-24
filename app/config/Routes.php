<?php

    /*
        --------------------------------
        Application routes
        --------------------------------
        Here you can define all your application routes and setup auto routing feature.
    */

    // Parse undefined routes automatically
    $glowieRoutes['auto_routing'] = true;

    // User defined routes
    $glowieRoutes['routes'] = array(

        '/' => [
            'controller' => 'main',
            'action' => 'index'
        ],

    );

?>