<?php
    namespace Glowie;

    /**
     * Router and starting point for Glowie application.
     * @category Router
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Rails{
        public $autoRouting;
        public $controller;
        public $handler;
        public $routes;

        public function __construct(){
            // Get routing configuration
            $this->routes = $GLOBALS['glowieRoutes']['routes'];
            $this->autoRouting = $GLOBALS['glowieRoutes']['autoRouting'];

            // Timezone configuration
            date_default_timezone_set($GLOBALS['glowieConfig']['timezone']);

            // Error handling
            $this->handler = new Error();
        }

        /**
         * Initializes application routes.
         */
        public function init(){
            // Get current route
            if (!empty($_GET['route']) && trim($_GET['route']) != '') {
                $route = trim($_GET['route']);
            } else {
                $route = '/';
            }

            $config = null;

            // Loops through routes configuration to find a valid route pattern
            foreach ($this->routes as $key => $item) {
                $regex = str_replace('/', '\/', preg_replace('(:[^\/]+)', '([^/]+)', ltrim($key, '/')));
                if (preg_match_all('/^' . $regex . '$/i', rtrim($route, '/'), $params)) {
                    // Fetch route parameters
                    $keys = explode('/:', $key);
                    $result = [];
                    if (count($keys) > 1) {
                        unset($params[0]);
                        unset($keys[0]);
                        foreach ($keys as $i => $value) $result[$value] = $params[$i][0];
                    }
                    $config = $item;
                    break;
                }
            }

            // Check if route was found
            if ($config) {
                // Check if there is a redirect configuration
                if(empty($config['redirect'])){
                    // If controller was not specified, calls the MainController
                    !empty($config['controller']) ? $controller = $this->parseName($config['controller'], true) . 'Controller' : $controller = 'MainController';

                    // If controller class does not exists, trigger an error
                    if (!class_exists($controller)) {
                        trigger_error('Controller "' . $controller . '" not found');
                        exit;
                    }

                    // If action was not specified, calls the indexAction
                    !empty($config['action']) ? $action = $this->parseName($config['action']) : $action = 'index';

                    // Instantiates new controller
                    $this->controller = new $controller;

                    // If action does not exists, trigger an error
                    if (method_exists($this->controller, $action  . 'Action')) {
                        // Parses URI parameters, if available
                        if (!empty($result)) $this->controller->params = new Objectify($result);

                        // Calls action
                        if (method_exists($this->controller, 'init')) call_user_func([$this->controller, 'init']);
                        call_user_func([$this->controller, $action  . 'Action']);
                    } else {
                        trigger_error('Action "' . $action . 'Action()" not found in ' . $controller);
                        exit;
                    }
                }else{
                    // Redirects to the target URL
                    \Util::redirect($config['redirect']);
                }
            } else {
                // Check if auto routing is enabled
                if($this->autoRouting){

                    // Get URI parameters
                    $autoroute = explode('/', $route);

                    // Cleans empty parameters or trailing slashes
                    foreach($autoroute as $key => $value){
                        if(empty($value) || trim($value) == '') unset($autoroute[$key]);
                    }

                    // If no route was specified
                    if($route == '/'){
                        $controller = 'MainController';
                        $action = 'indexAction';
                        $this->callAutoRoute($controller, $action);

                    // If only the controller was specified
                    }else if(count($autoroute) == 1){
                        $controller = $this->parseName($autoroute[0], true) . 'Controller';
                        $action = 'indexAction';
                        $this->callAutoRoute($controller, $action);

                    // Controller and action were specified
                    }else if(count($autoroute) == 2){
                        $controller = $this->parseName($autoroute[0], true) . 'Controller';
                        $action = $this->parseName($autoroute[1]) . 'Action';
                        $this->callAutoRoute($controller, $action);
                    
                    // Controller, action and parameters were specified
                    }else{
                        $controller = $this->parseName($autoroute[0], true) . 'Controller';
                        $action = $this->parseName($autoroute[1]) . 'Action';
                        $params = array_slice($autoroute, 2);
                        $this->callAutoRoute($controller, $action, $params);
                    }
                }else{
                    // Route was not found
                    $this->callNotFound();
                }
            }
        }

        /**
         * Parses names to camelCase convention. It also removes all accents and characters that are not\
         * valid letters, numbers or underscores.
         * @param string $string Name to be encoded.
         * @param bool $firstUpper Determines if the first character should be uppercase.
         * @return string Encoded string.
         */
        private function parseName($string, $firstUpper = false){
            $string = strtr(utf8_decode(strtolower($string)), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            $string = preg_replace('/[^a-zA-Z0-9_]/', ' ', $string);
            if($firstUpper){
                return str_replace(' ', '', ucwords($string));
            }else{
                return str_replace(' ', '', lcfirst(ucwords($string)));
            }
        }

        /**
         * Calls notFoundAction() in ErrorController.
         */
        private function callNotFound(){
            http_response_code(404);
            $controller = 'ErrorController';
            if (class_exists($controller)) {
                $this->controller = new $controller;
                if (method_exists($this->controller, 'init')) call_user_func([$this->controller, 'init']);
                if (method_exists($this->controller, 'notFoundAction')) call_user_func([$this->controller, 'notFoundAction']);
            }
        }

        /**
         * Performs checking and calls the auto routing parameters.
         * @param string $controller Controller class.
         * @param string $action Action name.
         * @param array $params Optional URI parameters.
         */
        private function callAutoRoute($controller, $action, $params = []){
            if (class_exists($controller)) {
                $this->controller = new $controller;
                if (method_exists($this->controller, $action)) {
                    if (!empty($params)){
                        foreach($params as $key => $value){
                            $params['segment' . ($key + 1)] = $value;
                            unset($params[$key]);
                        }
                        $this->controller->params = new Objectify($params);
                    }
                    if (method_exists($this->controller, 'init')) call_user_func([$this->controller, 'init']);
                    call_user_func([$this->controller, $action]);
                } else {
                    $this->callNotFound();
                };
            } else {
                $this->callNotFound();
            }
        }
    }

?>