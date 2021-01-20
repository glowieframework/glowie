<?php

    $glowieConfig['development'] = array(
        'appFolder' => '/glowie/',
        'timezone' => 'America/Sao_Paulo',
        'error_reporting' => E_ALL,
        'database' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'db' => 'glowie',
            'port' => 3306
        ]
    );

    $glowieConfig['production'] = array(
        'appFolder' => '',
        'timezone' => 'America/Sao_Paulo',
        'error_reporting' => 0,
        'database' => [
            'host' => 'localhost',
            'username' => 'user',
            'password' => '123',
            'db' => 'glowie',
            'port' => 3306
        ]
    );

?>