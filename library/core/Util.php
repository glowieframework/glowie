<?php

    /**
     * Miscellaneous utilities for Glowie applications.
     * @category Utility
     * @package GlowieFramework
     * @author Gabriel Silva
     * @copyright Copyright (c) 2020
     * @link https://github.com/glowie
     * @version 1.0.0
     */
    class Util{

        public static function log($var, $exit = false){
            var_dump($var);
            if($exit) exit();
        }

        public static function baseUrl($path = '')
        {
            !empty($_SERVER['HTTPS']) ? $protocol = 'https://' : $protocol = 'http://';
            return $protocol . $_SERVER['HTTP_HOST'] . $GLOBALS['glowieConfig']['appFolder'] . $path;
        }

        public static function redirect($destination, $js = false)
        {
            if ($js) {
                echo '<script>window.location = "' . $destination . '"</script>';
            } else {
                header('Location: ' . $destination);
            }
        }

        public static function orderArray($array, $key, $order)
        {
            if ((!empty($array)) && (!empty($key))) {
                if (is_array($array)) {
                    foreach ($array as $col => $row) {
                        $data_1[$col] = $row[$key];
                    }
                    array_multisort($data_1, $order, $array);
                }
            }
            return $array;
        }

        public static function filterArray($array, $key, $value)
        {
            $newarray = array();
            if (is_array($array) && count($array) > 0) {
                foreach (array_keys($array) as $col) {
                    $temp[$col] = $array[$col][$key];
                    if ($temp[$col] == $value) $newarray[$col] = $array[$col];
                }
            }
            return $newarray;
        }

        public static function searchArray($array, $key, $value)
        {
            $result = null;
            if (is_array($array) && count($array) > 0) {
                $index = array_search($value, array_column($array, $key));
                if ($index !== false) $result = $array[$index];
            }
            return $result;
        }

    }

?>