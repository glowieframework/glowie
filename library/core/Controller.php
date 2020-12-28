<?php
    namespace Glowie;

    /**
     * Controller base for Glowie application.
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
         */
        public $content;

        /**
         * Request GET parameters.
         */
        public $get;

        /**
         * URI parameters.
         */
        public $params;

        /**
         * Request POST parameters.
         */
        public $post;

        /**
         * Request parameters.
         */
        public $request;

        /**
         * Current Glowie version.
         */
        public $version;

        /**
         * Data bridge between controller and view.
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
            $this->view = new Objectify();

            // Request parameters
            $this->get = new Objectify($_GET);
            $this->post = new Objectify($_POST);
            $this->request = new Objectify($_REQUEST);

            // URI parameters
            $this->params = new Objectify();
        }

        /**
         * Renders a view file.
         * @param string $view View filename without extension. Must be a PHP file inside **views** folder.
         * @param array $params Optional parameters to pass into the view. Should be an associative array with\
         * each variable name and value.
         */
        public function renderView($view, $params = []){
            $view = 'views/' . $view . '.php';
            if(file_exists($view)){
                if(!empty($params) && is_array($params)) extract($params);
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
         * @param string $template Template filename without extension. Must be a PHP file inside **views/templates** folder.
         * @param string $view Optional view filename to render within template. You can place this view by using **$this->content**\
         * into the template file. Must be a PHP file inside **views** folder.
         * @param array $params Optional parameters to pass into the rendered view or template. Should be an associative array with\
         * each variable name and value.
         */
        public function renderTemplate($template, $view = '', $params = []){
            $template = 'views/templates/' . $template . '.php';
            if(!empty($view)){
                $view = 'views/' . $view . '.php';
                if (file_exists($template)) {
                    if(file_exists($view)){
                        if (!empty($params) && is_array($params)) extract($params);
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
                    if (!empty($params) && is_array($params)) extract($params);
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

    }

?>