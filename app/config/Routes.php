<?php

    // Parse undefined routes automatically
    $glowieRoutes['autoRouting'] = true;

    // Application routes
    $glowieRoutes['routes'] = array(
        '/' => [
            'controller' => 'main',
            'action' => 'index'
        ]
    );

?>