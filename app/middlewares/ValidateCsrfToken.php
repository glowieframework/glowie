<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Middleware;

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
    class ValidateCsrfToken extends Middleware{

        /**
         * The middleware handler.
         * @return bool Should return true on success or false on fail.
         */
        public function handle(){
            // Retrieves the token from POST request or headers
            if(!empty($this->post->_token)){
                $token = $this->post->_token;
            }else if(!empty($this->request->getHeader('X-CSRF-TOKEN'))){
                $token = $this->request->getHeader('X-CSRF-TOKEN');
            }else{
                return false;
            }

            // Validates the token
            if($this->request->checkCsrfToken($token)){
                return true;
            }else{
                return false;
            }
        }

    }

?>