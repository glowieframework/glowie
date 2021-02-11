<?php

    /**
     * Error controller for Glowie application.
     * @category Controller
     * @package glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 0.2-alpha
     */
    class ErrorController extends BaseController{

       public function init(){
           // This method will be instantiated before any other actions from this controller
       }

       public function notFoundAction(){
           // Renders 404 error page
           $this->renderView('error/404');
       }

       public function forbiddenAction(){
           // Renders 403 error page
           $this->renderView('error/403');
       }

    }

?>