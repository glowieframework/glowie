<?php

    // Application folder
    $glowieConfig['development']['appFolder'] = '/glowie/';
    $glowieConfig['production']['appFolder'] = '/';

    // Application default timezone
    $glowieConfig['development']['timezone'] = 'America/Sao_Paulo';
    $glowieConfig['production']['timezone'] = 'America/Sao_Paulo';

    // Error reporting level
    $glowieConfig['development']['errorReporting'] = E_ALL;
    $glowieConfig['production']['errorReporting'] = 0;

    // Database connection settings
    $glowieConfig['development']['database'] = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'app',
        'port' => 3306
    ];

    $glowieConfig['production']['database'] = [
        'host' => 'localhost',
        'username' => 'user',
        'password' => '123',
        'db' => 'app',
        'port' => 3306
    ];

?>