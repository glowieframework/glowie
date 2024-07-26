<?php

use Glowie\Core\Http\Rails;
use Glowie\Controllers\Main;

/*
    --------------------------------
    Application routes
    --------------------------------
    Here you can define all your application routes and setup auto routing.
    Use the Rails class in order to configure routing.
*/

Rails::addRoute('/', Main::class, 'index');
