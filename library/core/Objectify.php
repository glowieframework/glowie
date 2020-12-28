<?php
    namespace Glowie;

    /**
     * Array to object data parser for Glowie application.
     * @category Data parser
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Objectify{

        /**
         * Instantiates a new object.
         * @param string $data Initial data to parse (optional).
         */
        public function __construct($data = []){
            if(!empty($data)){
                foreach($data as $key => $value){
                    $this->$key = $value;
                }
            }
        }

        /**
         * Gets the value associated to a key in the data.
         * @param string $key Key to get value.
         * @return mixed Returns the value if exists or null if there is none.
         */
        public function __get($key){
            if(isset($this->$key)){
                return $this->$key;
            }else{
                return null;
            }
        }

        /**
         * Sets the value for a key in the data.
         * @param string $key Key to set value.
         * @param mixed $value Value to set.
         */
        public function __set($key, $value){
            $this->$key = $value;
        }

        /**
         * Deletes the associated key value in the data.
         * @param string $key Key to delete value.
         */
        public function __unset($key){
            if (isset($this->$key)) {
                unset($this->$key);
            }
        }

        /**
         * Checks if any value has been associated to a key in the data.
         * @param string $key Key to check.
         * @return bool Returns true or false.
         */
        public function __isset($key){
            return isset($this->$key);
        }

    }

?>