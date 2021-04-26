<?php
    namespace Glowie\Middlewares;

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
     * @version 0.3-alpha
     */
    class Authenticate extends BaseMiddleware{

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

        public function success(){
            //
        }

        public function fail(){
            //
        }

    }

?>