<?php
    namespace Glowie\Controllers;

    use Glowie\Core\Http\Controller;

    use Babel;

    /**
     * Base controller for Glowie application.
     * @category Controller
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class BaseController extends Controller{

        /**
         * This method will be called before any other methods from this controller.
         */
        public function init(){
            // Sets the current active language
            Babel::setActiveLanguage('en');
        }

    }

?>