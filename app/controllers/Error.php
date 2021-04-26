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
     * @version 0.3-alpha
     */
    class Error extends BaseController{

       public function init(){
           // This method will be instantiated before any other actions from this controller
           parent::init();
       }

       public function notFound(){
           // Renders 404 error page
           $this->renderView('error/404');
       }

       public function forbidden(){
           // Renders 403 error page
           $this->renderView('error/403');
       }

    }

?>