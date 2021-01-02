<?php

    /**
     * Miscellaneous utilities for Glowie application.
     * @category Utility
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Util{

        public static function includeStylesheet($path){
            echo '<link rel="stylesheet" href="' . self::baseUrl($path) . '">';
        }

        public static function includeScript($path){
            echo '<script src="' . self::baseUrl($path) . '"></script>';
        }

        public static function includeFavicon($path){
            echo '<link rel="shortcut icon" href="' . self::baseUrl($path) . '">';
        }

        public static function includeImage($path, $class = '', $id = ''){
            echo '<img src="' . self::baseUrl($path) . '" class="' . $class . '" id="' . $id . '">';
        }

        public static function log($var, $exit = false){
            var_dump($var);
            if($exit) exit();
        }

        public static function baseUrl($path = ''){
            !empty($_SERVER['HTTPS']) ? $protocol = 'https://' : $protocol = 'http://';
            $appFolder = $GLOBALS['glowieConfig']['appFolder'];
            if(substr($appFolder, 0, 1) != '/') $appFolder = '/' . $appFolder;
            if(substr($appFolder, -1, 1) != '/') $appFolder = $appFolder . '/';
            return $protocol . $_SERVER['HTTP_HOST'] . $appFolder . $path;
        }

        public static function redirect($destination, $js = false){
            if ($js) {
                echo '<script>window.location = "' . $destination . '"</script>';
            } else {
                header('Location: ' . $destination);
            }
        }

        public static function orderArray($array, $key, $order){
            if ((!empty($array)) && (!empty($key))) {
                if (is_array($array)) {
                    foreach ($array as $col => $row) {
                        $data[$col] = $row[$key];
                    }
                    array_multisort($data, $order, $array);
                }
            }
            return $array;
        }

        public static function filterArray($array, $key, $value){
            $newarray = array();
            if (is_array($array) && count($array) > 0) {
                foreach (array_keys($array) as $col) {
                    $temp[$col] = $array[$col][$key];
                    if ($temp[$col] == $value) $newarray[$col] = $array[$col];
                }
            }
            return $newarray;
        }

        public static function searchArray($array, $key, $value){
            $result = null;
            if (is_array($array) && count($array) > 0) {
                $index = array_search($value, array_column($array, $key));
                if ($index !== false) $result = $array[$index];
            }
            return $result;
        }

        public static function startsWith($haystack, $needle){
            $length = strlen($needle);
            return substr($haystack, 0, $length) === $needle;
        }

        public static function endsWith($haystack, $needle){
            $length = strlen($needle);
            if (!$length) {
                return true;
            }
            return substr($haystack, -$length) === $needle;
        }

        public static function encryptString($string, $secret_key){
            $secret_iv = 'g3H7M4snHPtuXzBu69FG';
            $output = false;
            $encrypt_method = "AES-256-CBC";
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
            return $output;
        }

        public static function decryptString($string, $secret_key){
            $secret_iv = 'g3H7M4snHPtuXzBu69FG';
            $output = false;
            $encrypt_method = "AES-256-CBC";
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            return $output;
        }

    }

?>