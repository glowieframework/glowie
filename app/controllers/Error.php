<?php
    namespace Glowie\Controllers;

    use Babel;

    /**
     * Error controller for Glowie application.
     * @category Controller
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://eugabrielsilva.tk/glowie
     */
    class Error extends BaseController{

        /**
         * This method will be called before any other methods from this controller.
         */
        public function init(){
            // Calls the BaseController init() method
            if(is_callable([parent::class, 'init'])) parent::init();
        }

        /**
         * Handler for 404 Not Found errors.
         */
        public function notFound(){
            // Renders 404 error page
            $this->renderLayout('default', 'error/error', [
                'title' => 'Page Not Found',
                'code' => 404,
                'message' => Babel::get('errors.not_found')
            ]);
        }

        /**
         * Handler for 403 Forbidden errors.
         */
        public function forbidden(){
            // Renders 403 error page
            $this->renderLayout('default', 'error/error', [
                'title' => 'Access Forbidden',
                'code' => 403,
                'message' => Babel::get('errors.forbidden')
            ]);
        }

        /**
         * Handler for 405 Method Not Allowed errors.
         */
        public function methodNotAllowed(){
            // Renders 405 error page
            $this->renderLayout('default', 'error/error', [
                'title' => 'Not Allowed',
                'code' => 405,
                'message' => Babel::get('errors.not_allowed')
            ]);
        }

        /**
         * Handler for 503 Service Unavailable errors.
         */
        public function serviceUnavailable(){
            // Renders 503 error page
            $this->renderLayout('default', 'error/error', [
                'title' => 'Service Unavailable',
                'code' => 503,
                'message' => Babel::get('errors.service_unavailable')
            ]);
        }

    }

?>