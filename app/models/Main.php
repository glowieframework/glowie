<?php
    namespace Glowie\Models;

    use Glowie\Core\Kraken;

    /**
     * Main model for Glowie application.
     * @category Model
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 0.2-alpha
     */
    class Main_Model extends Base_Model{

       public function __construct(){         
           // Constructs the connection
           Kraken::__construct('glowie');
       }

    }

?>