<?php
    namespace Glowie\Controllers;

    use Glowie\Core\Tools\Validator;
    use Glowie\Core\Tools\Authenticator;

    /**
     * Login controller for Glowie application.
     * @category Controller
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://eugabrielsilva.tk/glowie
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
            if((new Authenticator())->check()){
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
            if(!(new Validator())->validateFields($this->post, self::VALIDATION_RULES)){
                $this->session->setFlash('alert', 'Invalid login information!');
                return $this->response->redirectRoute('login');
            }

            // Perform user login
            $auth = new Authenticator();
            if($auth->login(trim(strtolower($this->post->email)), $this->post->password)){
                // Login successful
                $this->response->redirectRoute('dashboard');
            }else{
                // Show error message
                switch ($auth->getError()) {
                    case Authenticator::ERR_NO_USER:
                        $this->session->setFlash('alert', 'This user does not exist!');
                        break;

                    case Authenticator::ERR_WRONG_PASSWORD:
                        $this->session->setFlash('alert', 'Incorrect password!');
                        break;
                }

                // Go back to login screen
                $this->response->redirectRoute('login');
            }
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
            if(!(new Validator())->validateMultiple([$this->post->password, $this->post->password_confirm], 'required')){
                $this->session->setFlash('alert', 'Passwords cannot be empty!');
                return $this->response->redirectRoute('dashboard');
            }

            // Check if passwords match
            if($this->post->password !== $this->post->password_confirm){
                $this->session->setFlash('alert', "Passwords don't match!");
                return $this->response->redirectRoute('dashboard');
            }

            // Save new password in database
            $this->user->password = password_hash($this->post->password, PASSWORD_DEFAULT);
            $this->user->save();

            // Refresh authenticated user data
            (new Authenticator())->refresh();

            // Redirect back to the dashboard
            $this->session->setFlash('alert', 'Password changed!');
            $this->response->redirectRoute('dashboard');
        }

        /**
         * Logout action.
         */
        public function logout(){
            // Logout and redirect back to login page
            (new Authenticator())->logout();
            $this->response->redirectRoute('login');
        }

    }

?>