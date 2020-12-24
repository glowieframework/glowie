<?php
    use Glowie\Controller;

    /**
     * Error controller for Glowie application.
     * @category Controller
     * @package glowieframework
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class ErrorController extends Controller{

       public function defaultAction(){
           //
       }

       public function notFoundAction(){
           $this->renderView('error/404');
       }

    }

?>