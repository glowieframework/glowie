<?php

class Error{

    function errorHandler($num, $str, $file, $line, $context = null){
        $this->exceptionHandler(new ErrorException($str, 0, $num, $file, $line));
    }
    
    function fatalHandler(){
        $error = error_get_last();
        if ( $error["type"] == E_ERROR ){
            $this->errorHandler($error["type"], $error["message"], $error["file"], $error["line"]);
        }
    }

    function exceptionHandler(Exception $e){
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