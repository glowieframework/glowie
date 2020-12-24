<?php

    // Parse undefined routes automatically
    $glowieRoutes['autoRoutes'] = true;

    // Application routes
    $glowieRoutes['routes'] = [
        '/' => [
            'controller' => 'main',
            'action' => 'index'
        ]
    ];

?>