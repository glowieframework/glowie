<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Middleware;

    use Glowie\Core\Session;
    use Glowie\Core\Validator;
    use Glowie\Models\Users;

    /**
     * Sample middleware for Glowie application.
     * @category Middleware
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class Authenticate extends Middleware{

        /**
         * This method will be called before any other methods from this middleware.
         */
        public function init(){
            // This method is optional
        }

        /**
         * The middleware handler.
         * @return bool Should return true on success or false on fail.
         */
        public function handle(){
            // Gets session data
            $session = new Session();
            $sessionData = [
                'email' => $session->email,
                'password' => $session->password
            ];

            // Validates session data
            $validator = new Validator();
            $validationRules = [
                'email' => ['required', 'email'],
                'password' => ['required']
            ];

            if(!$validator->validateFields($sessionData, $validationRules)) return false;

            // Gets current user information
            $usersModel = new Users();
            $user = $usersModel->where('email', $sessionData['email'])->fetchRow();

            if(!$user) return false;

            // Checks password
            if(md5($sessionData['password']) != $user->password) return false;

            // Sends the authenticated user information to the controller
            $this->controller->user = $user;
            return true;
        }

        /**
         * Called if the middleware handler returns true.
         */
        public function success(){
            // This method is optional
        }

        /**
         * Called if the middleware handler returns false.
         */
        public function fail(){
            // This method is optional
        }

    }

?>