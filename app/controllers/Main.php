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
     * @version 0.3-alpha
     */
    class Main extends BaseController{

       public function init(){
           // This method will be instantiated before any other actions from this controller
           parent::init();
       }

       public function index(){
           // Renders the starting page
           $this->renderLayout('default', 'index');
       }

    }

?>