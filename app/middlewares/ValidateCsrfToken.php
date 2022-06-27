<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Http\Middleware;

    /**
     * CSRF token validation middleware for Glowie application.
     * @category Middleware
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://glowie.tk
     */
    class ValidateCsrfToken extends Middleware{

        /**
         * The middleware handler.
         * @return bool Should return true on success or false on fail.
         */
        public function handle(){
            // Retrieves the token from POST field or header
            $token = $this->post->_token ?? $this->request->getHeader('X-CSRF-TOKEN');

            // Validates the token
            if(empty($token)) return false;
            return $this->request->checkCsrfToken($token);
        }

    }

?>