<?php
    use Glowie\Core\Rails;

    /*
        --------------------------------
        Application routes
        --------------------------------
        Here you can define all your application routes and setup auto routing feature.
    */

    // Parse undefined routes automatically
    Rails::setAutoRouting(true);

    // User defined routes
    Rails::addRoute('/', 'main-controller', 'index');

?>