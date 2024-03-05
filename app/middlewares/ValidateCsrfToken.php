<?php
    namespace Glowie\Middlewares;

    use Glowie\Core\Http\Middleware;
    use Babel;

    /**
     * CSRF token validation middleware for Glowie application.
     * @category Middleware
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://gabrielsilva.dev.br/glowie
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

        /**
         * Called if the middleware handler returns false.
         */
        public function fail(){
            // Set HTTP 403 status code
            $this->response->deny();

            // Renders 403 error page
            $this->controller->renderLayout('default', 'error/error', [
                'title' => 'Access Forbidden',
                'code' => 403,
                'message' => Babel::get('errors.forbidden')
            ]);
        }

    }

?>