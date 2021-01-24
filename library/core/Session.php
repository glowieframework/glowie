<?php

    /**
     * Session manager for Glowie application.
     * @category Session manager
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Session{

        /**
         * Instantiates a new session or resumes the existing one.
         */
        public function __construct(){
            if(!isset($_SESSION)) session_start();
        }

        /**
         * Gets the value associated to a key in the session.
         * @param string $key Key to get value.
         * @return mixed Returns the value if exists or null if there is none.
         */
        public function __get($key){
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }else{
                return null;
            }
        }

        /**
         * Sets the value for a key in the session.
         * @param string $key Key to set value.
         * @param mixed $value Value to set.
         */
        public function __set($key, $value){
            $_SESSION[$key] = $value;
        }

        /**
         * Deletes the associated key value in the session.
         * @param string $key Key to delete value.
         */
        public function __unset($key){
            if (isset($_SESSION[$key])) {
                unset($_SESSION[$key]);
            }
        }

        /**
         * Checks if any value has been associated to a key in the session.
         * @param string $key Key to check.
         * @return bool Returns true or false.
         */
        public function __isset($key){
            return isset($_SESSION[$key]);
        }

        /**
         * Destroys current session and starts a new one.
         */
        public function destroy(){
            if(isset($_SESSION)) session_destroy();
            session_start();
        }

    }

?>