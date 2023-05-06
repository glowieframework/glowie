<?php
    use Glowie\Core\Http\Rails;
    use Glowie\Controllers\Main;
    use Glowie\Controllers\Login;
    use Glowie\Middlewares\Authenticate;
    use Glowie\Middlewares\ValidateCsrfToken;

    /*
        --------------------------------
        Application routes
        --------------------------------
        Here you can define all your application routes and setup auto routing.
        Use the Rails class in order to configure routing.
    */

    // Index
    Rails::addRoute('/', Main::class, 'index');

    // Authentication Demo
    Rails::groupRoutes('auth', function(){
        Rails::addRoute('login', Login::class, 'login');
        Rails::addProtectedRoute('submit-login', ValidateCsrfToken::class, Login::class, 'submitLogin', 'post');
        Rails::addProtectedRoute('dashboard', Authenticate::class, Login::class, 'dashboard');
        Rails::addProtectedRoute('change-password', [ValidateCsrfToken::class, Authenticate::class], Login::class, 'changePassword', 'post');
        Rails::addRoute('logout', Login::class, 'logout');
    });

?>