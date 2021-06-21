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
            // Calls the extended class init method
            parent::init();
        }

        /**
         * Default handler for 404 errors.
         */
        public function notFound(){
            // Renders 404 error page
            $this->renderLayout('default', 'error/404', [
                'title' => '404 | Page not found'
            ]);
        }
        
        /**
         * Default handler for 403 errors.
         */
        public function forbidden(){
            // Renders 403 error page
            $this->renderLayout('default', 'error/403', [
                'title' => 'Access forbidden'
            ]);
        }
    
    }

?>