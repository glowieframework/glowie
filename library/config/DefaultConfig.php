<?php

    // Application root folder relative to the server URL
    // Example: if your app runs in http://mywebsite.com/app it shoud be /app/
    $glowieConfig['appFolder'] = '/glowie/';

    // Application default timezone
    $glowieConfig['timezone'] = 'America/Sao_Paulo';

    // Error reporting level
    $glowieConfig['errorReporting'] = E_ALL;

    // Database connection settings
    $glowieConfig['database'] = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'glowie',
        'port' => 3306
    ];

    $glowieConfig['routes'] = [
        '/' => 'index'
    ];

?>