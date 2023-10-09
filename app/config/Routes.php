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

    // Home
    Rails::addRoute('/', Main::class, 'index');

    // Authentication Demo
    Rails::groupRoutes('auth', function(){

        // Login page
        Rails::addRoute('login', Login::class, 'login');

        // Login submit handler
        Rails::addProtectedRoute('submit-login', ValidateCsrfToken::class, Login::class, 'submitLogin', 'post');

        // Dashboard page (access to logged users only)
        Rails::addProtectedRoute('dashboard', Authenticate::class, Login::class, 'dashboard');

        // Change password handler
        Rails::addProtectedRoute('change-password', [ValidateCsrfToken::class, Authenticate::class], Login::class, 'changePassword', 'post');

        // Logout page
        Rails::addRoute('logout', Login::class, 'logout');
    }, true);

?>