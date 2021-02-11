<?php

    /**
     * Main controller for Glowie application.
     * @category Controller
     * @package glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 0.2-alpha
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