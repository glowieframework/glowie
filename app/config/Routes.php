<?php
    use Glowie\Core\Rails;
    use Glowie\Controllers\Main;

    /*
        --------------------------------
        Application routes
        --------------------------------
        Here you can define all your application routes and setup auto routing feature.
    */

    // Uncomment next line to parse undefined routes automatically
    # Rails::setAutoRouting(true);

    // User defined routes
    Rails::addRoute('/', Main::class, 'index');

?>