<?php
    namespace Glowie\Controllers;

    use Glowie\Core\Tools\Validator;

    /**
     * Login controller for Glowie application.
     * @category Controller
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://glowie.tk
     */
    class Login extends BaseController{

        /**
         * Current user entity.
         * @var \Glowie\Models\Users
         */
        public $user;

        /**
         * Validation rules.
         * @var array
         */
        public const VALIDATION_RULES = [
            'email' => ['required', 'email'],
            'password' => 'required'
        ];

        /**
         * This method will be called before any other methods from this controller.
         */
        public function init(){
            // Calls the BaseController init() method
            if(is_callable([parent::class, 'init'])) parent::init();
        }

        /**
         * Login action.
         */
        public function login(){
            // Checks if user is already logged in
            $validator = new Validator();
            if($validator->validateFields($this->session, self::VALIDATION_RULES)){
                return $this->response->redirectRoute('dashboard');
            }

            // Renders the login page
            $this->renderLayout('default', 'login', [
                'title' => 'Login | Demo',
                'alert' => $this->session->getFlash('alert')
            ]);
        }

        /**
         * Submit login action.
         */
        public function submitLogin(){
            // Validate POST data
            $validator = new Validator();
            if(!$validator->validateFields($this->post, self::VALIDATION_RULES)){
                $this->session->setFlash('alert', 'Invalid login information!');
                return $this->response->redirectRoute('login');
            }

            // Save login data in the session
            $this->session->email = trim(strtolower($this->post->email));
            $this->session->password = $this->post->password;
            $this->response->redirectRoute('dashboard');
        }

        /**
         * Dashboard action.
         */
        public function dashboard(){
            // Renders the dashboard page
            $this->renderLayout('default', 'dashboard', [
                'title' => 'Dashboard | Demo',
                'user' => $this->user,
                'alert' => $this->session->getFlash('alert')
            ]);
        }

        /**
         * Change password action.
         */
        public function changePassword(){
            // Validate POST data
            $validator = new Validator();
            if(!$validator->validateMultiple([$this->post->password, $this->post->password_confirm], 'required')){
                $this->session->setFlash('alert', 'Passwords cannot be empty!');
                return $this->response->redirectRoute('dashboard');
            }

            // Check if passwords match
            if($this->post->password !== $this->post->password_confirm){
                $this->session->setFlash('alert', "Passwords don't match!");
                return $this->response->redirectRoute('dashboard');
            }

            // Save new password in database and session
            $this->user->password = password_hash($this->post->password, PASSWORD_DEFAULT);
            $this->session->password = $this->post->password;
            $this->user->save();

            // Redirect back to the dashboard
            $this->session->setFlash('alert', 'Password changed!');
            $this->response->redirectRoute('dashboard');
        }

        /**
         * Logout action.
         */
        public function logout(){
            // Clear session data and redirect to login
            $this->session->flush();
            $this->response->redirectRoute('login');
        }

    }

?>