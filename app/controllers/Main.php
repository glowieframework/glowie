<?php
    namespace Glowie\Controllers;

    /**
     * Main controller for Glowie application.
     * @category Controller
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class Main extends BaseController{
        
        /**
         * This method will be called before any other methods from this controller.
         */
        public function init(){
            // Calls the extended class init method
            parent::init();
        }
        
        /**
         * Index action.
         */
        public function index(){
            // Renders the starting page
            $this->renderLayout('default', 'index');
        }

    }

?>