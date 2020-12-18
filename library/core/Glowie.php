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
        public $content = '';
        public $routes = array();
        public $version = '1.0.0';
        public $view = null;
        
        public function __construct(){
            $this->routes = $GLOBALS['glowieConfig']['routes'];
            $this->view = new stdClass();

            date_default_timezone_set($GLOBALS['glowieConfig']['timezone']);
            error_reporting($GLOBALS['glowieConfig']['errorReporting']);
        }

        public function init(){
            if(!empty($_GET['route']) && trim($_GET['route']) != ''){
                $route = strtolower(trim($_GET['route']));
            }else{
                $route = '/';
            }

            if(array_key_exists($route, $this->routes)){
                call_user_func(array($this, 'defaultAction'));
                call_user_func(array($this, $this->routes[$route] . 'Action'));
            }else{
                http_response_code(404);
            }
        }
        
        public function renderView($view){
            $view = 'views/' . $view . '.php';
            if(file_exists($view)){
                require_once $view;
            }else{
                http_response_code(404);
                exit();
            }
        }

        public function renderTemplate($template, $view = ''){
            $template = 'views/templates/' . $template . '.php';
            $view = 'views/' . $view . '.php';
            if($view != ''){
                if (file_exists($template) && file_exists($view)) {
                    $this->content = $this->readFileBuffer($view);
                    require_once $template;
                } else {
                    http_response_code(404);
                    exit();
                }
            }else{
                if (file_exists($template)) {
                    $this->content = '';
                    require_once $template;
                } else {
                    http_response_code(404);
                    exit();
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