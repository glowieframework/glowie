<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Http\Middleware;

    use Glowie\Core\Tools\Validator;
    use Glowie\Models\Users;
    use Glowie\Controllers\Login;

    /**
     * Authentication middleware for Glowie application.
     * @category Middleware
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://glowie.tk
     */
    class Authenticate extends Middleware{

        /**
         * The middleware handler.
         * @return bool Should return true on success or false on fail.
         */
        public function handle(){
            // Validates session data
            $validator = new Validator();
            if(!$validator->validateFields($this->session, Login::VALIDATION_RULES)) return false;

            // Gets current user information
            $usersModel = new Users();
            $user = $usersModel->findBy('email', $this->session->email);

            // Checks if user exists
            if(!$user) return false;

            // Checks password
            if(!password_verify($this->session->password, $user->password)) return false;

            // Sends the authenticated user information to the controller
            $this->controller->user = $usersModel->fill($user);
            return true;
        }

        /**
         * Called if the middleware handler returns false.
         */
        public function fail(){
            // Clear session data and redirect to login
            $this->session->flush();
            $this->session->setFlash('alert', 'Invalid login information!');
            $this->response->redirectRoute('login');
        }

    }

?>