<?php
    namespace Glowie\Helpers;

    /**
     * View helpers for Glowie application.
     * @category Helpers
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 0.3-alpha
     */
    class Helpers{

        /**
         * Returns the page rendering time.
         * @return float Page rendering time.
         */
        public function getRenderTime(){
            return round((microtime(true) - GLOWIE_START_TIME), 5);
        }

    }

?>