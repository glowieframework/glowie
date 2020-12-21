<?php

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
        'db' => 'glowie',
        'port' => 3306
    ];

    $glowieConfig['production']['database'] = [
        'host' => 'localhost',
        'username' => 'user',
        'password' => '123',
        'db' => 'glowie',
        'port' => 3306
    ];

?>