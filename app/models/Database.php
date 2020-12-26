<?php
    use Glowie\Kraken;

    /**
     * Main database model for Glowie application.
     * @category Model
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Database extends Kraken{

       public function __construct(){
           
            // Setup database and table for this model
           parent::__construct([], 'glowie');
       }

    }

?>