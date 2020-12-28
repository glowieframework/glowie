<?php

    // Parse undefined routes automatically
    $glowieRoutes['autoRouting'] = true;

    // Application routes
    $glowieRoutes['routes'] = [
        '/' => [
            'controller' => 'main',
            'action' => 'index'
        ]
    ];

?>