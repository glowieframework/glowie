<?php
    namespace Glowie;

    /**
     * Glowie application router.
     * @category Router
     * @package glowieframework
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Rails{
        private $controller;
        private $handler;
        private $routes;

        public function __construct(){
            // Get routing configuration
            $this->routes = $GLOBALS['glowieRoutes'];

            // Error handling
            $this->handler = new Error();
            error_reporting($GLOBALS['glowieConfig']['errorReporting']);
            register_shutdown_function([$this->handler, 'fatalHandler']);
            set_error_handler([$this->handler, 'errorHandler']);
            set_exception_handler([$this->handler, 'exceptionHandler']);
            ini_set('display_errors', 'off');
        }

        /**
         * Initializes application routes.
         */
        public function init(){
            if (!empty($_GET['route']) && trim($_GET['route']) != '') {
                $route = trim($_GET['route']);
            } else {
                $route = '/';
            }

            $config = null;
            foreach ($this->routes as $key => $item) {
                $regex = str_replace('/', '\/', preg_replace('(:[^\/]+)', '([^/]+)', ltrim($key, '/')));
                if (preg_match_all('/^' . $regex . '$/i', rtrim($route, '/'), $params)) {
                    $keys = explode('/:', $key);
                    $result = [];
                    if (count($keys) > 1) {
                        unset($params[0]);
                        unset($keys[0]);
                        foreach ($keys as $i => $value) $result[$value] = $params[$i][0];
                        if (!empty($result)) $this->params = $result;
                    }
                    $config = $item;
                    break;
                }
            }
            if ($config) {
                if(!empty($config['controller'])){
                    $controller = $config['controller'] . 'Controller';
                }else{
                    $controller = 'MainController';
                }
                if(!class_exists($controller)){
                    trigger_error('Controller "' . $controller . '" not found');
                    exit;
                }
                $this->controller = new $controller;
                if (method_exists($this->controller, 'defaultAction')) call_user_func([$this->controller, 'defaultAction']);
                if(!empty($config['action'])){
                    if (method_exists($this->controller, $config['action'] . 'Action')) {
                        call_user_func([$this->controller, $config['action'] . 'Action']);
                    } else {
                        trigger_error('Action "' . $config['action'] . 'Action()" not found in ' . $controller);
                        exit;
                    } 
                }
            } else {
                $error = 'ErrorController';
                if(class_exists($error)){
                    $this->controller = new $error;
                    if(method_exists($this->controller, 'errorAction')){
                        call_user_func([$this->controller, 'errorAction']);
                    }else{
                        http_response_code(404);
                    }
                }else{
                    http_response_code(404);
                }
            }
        }
    }

?>