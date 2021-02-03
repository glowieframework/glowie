<?php

    /**
     * Error controller for Glowie application.
     * @category Controller
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class ErrorController extends BaseController{

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