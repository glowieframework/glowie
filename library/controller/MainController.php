<?php

    /**
     * Main controller for Glowie application.
     * @category Controller
     * @package glowieframework
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class MainController extends Glowie{

       public function defaultAction(){
           //
       }

       public function indexAction(){
           $this->renderTemplate('main', 'index');
       }

    }

?>