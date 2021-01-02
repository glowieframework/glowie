<?php

    /**
     * Localisation helper for Glowie application.
     * @category Localisation
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Babel{

        /**
         * Gets a localisation string from a language configuration.
         * @param string $key Key to get string.
         * @param string $lang Language to get data.
         * @return string|null
         */
        public static function getTranslation($key, $lang = 'en'){
            if(isset($GLOBALS['glowieLang']) && !empty($GLOBALS['glowieLang'])){
                if(isset($GLOBALS['glowieLang'][$lang]) && !empty($GLOBALS['glowieLang'][$lang])){
                    if(isset($GLOBALS['glowieLang'][$lang][$key])){
                        return $GLOBALS['glowieLang'][$lang][$key];
                    }else{
                        return null;
                    }
                }else{
                    trigger_error('Language "'.$lang.'" not found');
                }
            }else{
                trigger_error('Language configuration not found');
            }
        }

    }

?>