<?php
    namespace Glowie;

    /**
     * Glowie application error handler.
     * @category Error handler
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Error{

        /**
         * Default error handler. Creates an exception based on given error.
         * @param int $num Error type code.
         * @param string $str Error message.
         * @param string $file Filename where the error was thrown.
         * @param int $line Line number where the error was thrown.
         */
        function errorHandler($num, $str, $file, $line){
            $this->exceptionHandler(new \ErrorException($str, 0, $num, $file, $line));
        }

        /**
         * Fatal error handler.
         */
        function fatalHandler(){
            $error = error_get_last();
            if ($error && $error["type"] == E_ERROR ){
                $this->errorHandler($error["type"], $error["message"], $error["file"], $error["line"]);
            }
        }

        /**
         * Exception handler.
         * @param Exception $e Thrown exception.
         */
        function exceptionHandler(\Exception $e){
            echo '<style>
                    .glowieError{
                        font-family: Segoe UI, sans-serif;
                        font-size: 18px;
                        background-color: white;
                        color: black;
                        margin: 10px;
                        padding: 20px;
                        border: 1px solid gainsboro;
                        box-shadow: 2px 3px 2px gainsboro;
                    }

                    .glowieError i{
                        color: dimgray;
                    }

                    .glowieError pre{
                        font-size: 18px;
                    }
                </style>
                <div class="glowieError">
                    <strong>Application error:</strong> ' . $e->getMessage() . '<br>
                    <i>' . $e->getFile() . ':' . $e->getLine() . '</i><br><br>
                    <pre>' . $e->getTraceAsString() . '</pre>
                </div>';
            exit();
        }

    }

?>