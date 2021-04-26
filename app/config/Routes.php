<?php
    use Glowie\Core\Rails;
    use Glowie\Controllers\Main;

    /*
        --------------------------------
        Application routes
        --------------------------------
        Here you can define all your application routes and setup auto routing feature.
    */

    // Parse undefined routes automatically
    Rails::setAutoRouting(true);

    // User defined routes
    Rails::addRoute('/', Main::class, 'index');

?>