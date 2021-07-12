<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Middleware;
    
    use Util;

    /**
     * CSRF token validation middleware for Glowie application.
     * @category Middleware
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class CsrfToken extends Middleware{

        /**
         * The middleware handler.
         * @return bool Should return true on success or false on fail.
         */
        public function handle(){
            // Validates the token input field from POST method
            if(!$this->post->token) return false;
            if(Util::checkCsrfToken($this->post->token)){
                return true;
            }else{
                return false;
            }
        }

    }

?>