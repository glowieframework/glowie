<?php
    namespace Glowie\Controllers;

    /**
     * Error controller for Glowie application.
     * @category Controller
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class Error extends BaseController{
        
        /**
         * This method will be called before any other methods from this controller.
         */
        public function init(){
            // Calls the BaseController init() method
            parent::init();
        }

        /**
         * Handler for 404 Not Found errors.
         */
        public function notFound(){
            // Renders 404 error page
            $this->renderLayout('default', 'error/404', [
                'title' => '404 | Page not found'
            ]);
        }
        
        /**
         * Handler for 403 Forbidden errors.
         */
        public function forbidden(){
            // Renders 403 error page
            $this->renderLayout('default', 'error/403', [
                'title' => 'Access forbidden'
            ]);
        }
    
    }

?>