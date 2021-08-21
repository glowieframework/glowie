<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Http\Middleware;

    use Glowie\Core\Tools\Validator;
    use Glowie\Models\Users;

    /**
     * Authentication middleware for Glowie application.
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
         * The middleware handler.
         * @return bool Should return true on success or false on fail.
         */
        public function handle(){
            // Gets session data
            $sessionData = [
                'email' => $this->session->email,
                'password' => $this->session->password
            ];

            // Validates session data
            $validator = new Validator();
            $validationRules = [
                'email' => ['required', 'email'],
                'password' => 'required'
            ];

            if(!$validator->validateFields($sessionData, $validationRules)) return false;

            // Gets current user information
            $usersModel = new Users();
            $user = $usersModel->findBy('email', $sessionData['email']);

            if(!$user) return false;

            // Checks password
            if(!password_verify($sessionData['password'], $user->password)) return false;

            // Sends the authenticated user information to the controller
            $this->controller->user = $user;
            return true;
        }

    }

?>