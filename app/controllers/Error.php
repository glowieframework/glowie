<?php
    namespace Glowie\Controllers;

    use Babel;

    /**
     * Error controller for Glowie application.
     * @category Controller
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class Error extends BaseController{

        /**
         * Handler for 404 Not Found errors.
         */
        public function notFound(){
            // Renders 404 error page
            $this->renderLayout('default', 'error/error', [
                'title' => 'Page not found',
                'code' => 404,
                'message' => Babel::get('not_found')
            ]);
        }

        /**
         * Handler for 403 Forbidden errors.
         */
        public function forbidden(){
            // Renders 403 error page
            $this->renderLayout('default', 'error/error', [
                'title' => 'Access forbidden',
                'code' => 403,
                'message' => Babel::get('forbidden')
            ]);
        }

        /**
         * Handler for 405 Method Not Allowed errors.
         */
        public function methodNotAllowed(){
            // Renders 405 error page
            $this->renderLayout('default', 'error/error', [
                'title' => 'Not allowed',
                'code' => 405,
                'message' => Babel::get('not_allowed')
            ]);
        }

    }

?>