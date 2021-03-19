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
     * @version 0.2-alpha
     */
    class Main_Controller extends Base_Controller{

       public function init(){
           // This method will be instantiated before any other actions from this controller
       }

       public function indexAction(){
           // Renders the starting page
           $this->renderLayout('default', 'index');
       }

    }

?>