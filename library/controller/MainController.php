<?php

    class GlowieController extends Glowie{

       public function defaultAction(){

       }

       public function indexAction(){
           $this->renderTemplate('main', 'index');
       }

    }

?>