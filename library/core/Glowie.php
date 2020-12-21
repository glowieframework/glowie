<?php

    /**
     * Main Glowie application core.
     * @category Framework
     * @package glowieframework
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Glowie{
        public $content;
        public $params;
        public $version;
        public $view;

        private $handler;
        
        public function __construct(){
            $this->version = '1.0.0';
            $this->view = new stdClass();
            
            // Timezone config
            date_default_timezone_set($GLOBALS['glowieConfig']['timezone']);

            // Error handling
            $this->handler = new Error();
            error_reporting($GLOBALS['glowieConfig']['errorReporting']);
            register_shutdown_function([$this->handler, 'fatalHandler']);
            set_error_handler([$this->handler, 'errorHandler']);
            set_exception_handler([$this->handler, 'exceptionHandler']);
            ini_set('display_errors', 'off');
        }
        
        public function renderView($view){
            $view = 'views/' . $view . '.php';
            if(file_exists($view)){
                require_once $view;
            }else{
                trigger_error('File "' . $view . '" not found');
                exit;
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
                        exit;
                    }
                } else {
                    trigger_error('File "' . $view . '" not found');
                    exit;
                }
            }else{
                if (file_exists($template)) {
                    $this->content = '';
                    require_once $template;
                } else {
                    trigger_error('File "' . $template . '" not found');
                    exit;
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