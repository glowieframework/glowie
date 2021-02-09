<?php

    /**
     * Main model for Glowie application.
     * @category Model
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 0.1.0
     */
    class MainModel extends BaseModel{

       public function __construct(){         
           // Setup database and table for this model
           parent::__construct([], 'glowie');
       }

    }

?>