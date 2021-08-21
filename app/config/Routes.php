<?php
    use Glowie\Core\Http\Rails;
    use Glowie\Controllers\Main;

    /*
        --------------------------------
        Application routes
        --------------------------------
        Here you can define all your application routes and setup auto routing feature.
    */

    Rails::addRoute('/', Main::class, 'index');

?>