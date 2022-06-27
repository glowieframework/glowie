<?php
    namespace Glowie\Helpers;

    /**
     * View helpers for Glowie application.
     * @category Helpers
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://glowie.tk
     */
    class Helpers{

        /**
         * Returns the page rendering time.
         * @return float Page rendering time.
         */
        public function getRenderTime(){
            return round((microtime(true) - APP_START_TIME) * 1000, 2) . 'ms';
        }

    }

?>