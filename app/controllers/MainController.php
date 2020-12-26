<?php
    use Glowie\Controller;

    /**
     * Main controller for Glowie application.
     * @category Controller
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class MainController extends Controller{

       public function defaultAction(){
           //
       }

       public function indexAction(){
           $this->renderTemplate('default', 'index');
       }

    }

?>