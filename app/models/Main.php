<?php

    /**
     * Main model for Glowie application.
     * @category Model
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 0.2-alpha
     */
    class MainModel extends BaseModel{

       public function __construct(){         
           // Setup table for this model
           $this->setTable('glowie');
       }

    }

?>