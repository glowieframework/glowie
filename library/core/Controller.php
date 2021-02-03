<?php
    namespace Glowie;

    /**
     * Controller core for Glowie application.
     * @category Controller
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Controller{
        /**
         * Content handler for templates.
         * @var string
         */
        public $content;

        /**
         * Request GET parameters.
         * @var object
         */
        public $get;

        /**
         * URI parameters.
         * @var object
         */
        public $params;

        /**
         * Request POST parameters.
         * @var object
         */
        public $post;

        /**
         * Request parameters.
         * @var object
         */
        public $request;

        /**
         * Web server parameters.
         * @var object
         */
        public $server;

        /**
         * Current Glowie version.
         * @var string
         */
        public $version;

        /**
         * Data bridge between controller and view.
         * @var object
         */
        public $view;

        /**
         * Instantiates a new instance of the controller.
         */
        public function __construct(){
            // Common properties
            $this->version = '1.0.0';

            // View and template properties
            $this->content = '';
            $this->view = new \Objectify();

            // Request parameters
            $this->get = new \Objectify($_GET, true);
            $this->post = new \Objectify($_POST, true);
            $this->request = new \Objectify($_REQUEST, true);
            $this->server = new \Objectify($_SERVER, true);

            // URI parameters
            $this->params = new \Objectify();
        }

        /**
         * Renders a view file.
         * @param string $view View filename without extension. Must be a **.phtml** file inside **views** folder.
         * @param array $params (Optional) Parameters to pass into the view. Should be an associative array with\
         * each variable name and value.
         */
        public function renderView(string $view, array $params = []){
            if(!is_array($params)) trigger_error('renderView: $params must be an array');
            $view = '../views/' . $view . '.phtml';
            if(file_exists($view)){
                if(!empty($params)) extract($params);
                ob_start();
                require($view);
                echo ob_get_clean();
            }else{
                trigger_error('File "' . $view . '" not found');
                exit;
            }
        }

        /**
         * Renders a template file.
         * @param string $template Template filename without extension. Must be a **.phtml** file inside **views/templates** folder.
         * @param string $view (Optional) View filename to render within template. You can place this view by using **$this->content**\
         * in the template file. Must be a **.phtml** file inside **views** folder.
         * @param array $params (Optional) Parameters to pass into the rendered view or template. Should be an associative array with\
         * each variable name and value.
         */
        public function renderTemplate(string $template, string $view = '', array $params = []){
            if (!is_array($params)) trigger_error('renderTemplate: $params must be an array');
            $template = '../views/templates/' . $template . '.phtml';
            if(!empty($view)){
                $view = '../views/' . $view . '.phtml';
                if (file_exists($template)) {
                    if(file_exists($view)){
                        if (!empty($params)) extract($params);
                        ob_start();
                        require($view);
                        $this->content = ob_get_clean();
                        ob_start();
                        require($template);
                        echo ob_get_clean();
                    }else{
                        trigger_error('File "' . $view . '" not found');
                        exit;
                    }
                } else {
                    trigger_error('File "' . $template . '" not found');
                    exit;
                }
            }else{
                if (file_exists($template)) {
                    if (!empty($params)) extract($params);
                    $this->content = '';
                    ob_start();
                    require($template);
                    echo ob_get_clean();
                } else {
                    trigger_error('File "' . $template . '" not found');
                    exit;
                }
            }
        }

        /**
         * Returns the page rendering time.
         * @return float Page rendering time.
         */
        public function getRenderTime(){
            return round((microtime(true) - $GLOBALS['glowieTimer']), 5);
        }

    }

?>