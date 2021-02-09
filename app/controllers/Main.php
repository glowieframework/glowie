<?php

    /**
     * Main controller for Glowie application.
     * @category Controller
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 0.1.0
     */
    class MainController extends BaseController{

       public function init(){
           // This method will be instantiated before any other actions from this controller
       }

       public function indexAction(){
           // Renders the starting page
           $this->renderTemplate('default', 'index');
       }

    }

?>