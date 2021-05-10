<?php
    namespace Glowie\Middlewares;
    
    use Glowie\Core\Middleware;

    /**
     * Base middleware for Glowie application.
     * @category Middleware
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class BaseMiddleware extends Middleware{

        /**
         * This method will be called before any other methods from this middleware.
         */
        public function init(){
           // This method is optional
        }

        // Use this middleware to create properties and methods that can be reused in other middlewares of your application

    }

?>