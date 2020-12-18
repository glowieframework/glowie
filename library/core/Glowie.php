<?php

    /**
     * Main Glowie application core.
     * @category Framework
     * @package GlowieFramework
     * @author Gabriel Silva
     * @copyright Copyright (c) 2020
     * @link https://github.com/glowie
     * @version 1.0.0
     */
    class Glowie{
        public $content;
        public $routes;
        public $version = '1.0.0';
        public $view;

        private $handler;
        
        public function __construct(){
            $this->routes = $GLOBALS['glowieConfig']['routes'];
            $this->view = new stdClass();
            
            date_default_timezone_set($GLOBALS['glowieConfig']['timezone']);

            // Error handling
            $this->handler = new Error();
            error_reporting($GLOBALS['glowieConfig']['errorReporting']);
            register_shutdown_function([$this->handler, 'fatalHandler']);
            set_error_handler([$this->handler, 'errorHandler']);
            set_exception_handler([$this->handler, 'exceptionHandler']);
            ini_set('display_errors', 'off');
        }

        public function init(){
            if(!empty($_GET['route']) && trim($_GET['route']) != ''){
                $route = strtolower(trim($_GET['route']));
            }else{
                $route = '/';
            }

            if(array_key_exists($route, $this->routes)){
                if(method_exists($this, 'defaultAction')) call_user_func([$this, 'defaultAction']);
                if(method_exists($this, $this->routes[$route] . 'Action')){
                    call_user_func([$this, $this->routes[$route] . 'Action']);
                }else{
                    trigger_error('Action "' . $this->routes[$route] . '" not found in application controller');
                }
            }else{
                if (method_exists($this, 'errorAction')){
                    call_user_func([$this, 'errorAction']);
                }else{
                    http_response_code(404);
                }
            }
        }
        
        public function renderView($view){
            $view = 'views/' . $view . '.php';
            if(file_exists($view)){
                require_once $view;
            }else{
                trigger_error('File "' . $view . '" not found');
            }
        }

        public function renderTemplate($template, $view = ''){
            $template = 'views/templates/' . $template . '.php';
            $view = 'views/' . $view . '.php';
            if($view != ''){
                if (file_exists($template)) {
                    if(file_exists($view)){
                        $this->content = $this->readFileBuffer($view);
                        require_once $template;
                    }else{
                        trigger_error('File "' . $view . '" not found');
                    }
                } else {
                    trigger_error('File "' . $view . '" not found');
                }
            }else{
                if (file_exists($template)) {
                    $this->content = '';
                    require_once $template;
                } else {
                    trigger_error('File "' . $template . '" not found');
                }
            }
        }

        private function readFileBuffer($file){
            ob_start();
            require_once($file);
            return ob_get_clean();
        }

    }

?>