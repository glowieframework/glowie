<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Http\Middleware;
    use Glowie\Controllers\Login;
    use Glowie\Core\Tools\Authenticator;
    use Babel;

    /**
     * Authentication middleware for Glowie application.
     * @category Middleware
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://eugabrielsilva.tk/glowie
     */
    class Authenticate extends Middleware{

        /**
         * Login controller.
         * @var Login
         */
        protected $controller;

        /**
         * The middleware handler.
         * @return bool Should return true on success or false on fail.
         */
        public function handle(){
            // Checks if user is authenticated
            $auth = new Authenticator();
            if(!$auth->check()) return false;

            // Sends the authenticated user information to the controller
            $this->controller->user = $auth->getUser();
            return true;
        }

        /**
         * Called if the middleware handler returns false.
         */
        public function fail(){
            // Clear session data and redirect to login
            (new Authenticator())->logout();
            $this->session->setFlash('alert', Babel::get('auth.login_required'));
            $this->response->redirectRoute('login');
        }

    }

?>