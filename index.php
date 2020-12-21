<?php

    // Setup Glowie application and environment
    require_once 'library/autoload.php';
    $glowieConfig = $glowieConfig[getenv('GLOWIE_ENV')];
    $glowieConfig['appFolder'] = dirname($_SERVER['SCRIPT_NAME']) . '/';

    // Initialize routing
    $app = new Glowie\Rails();
    $app->init();
    
?>