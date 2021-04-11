<?php
    namespace Glowie\Models;

    /**
     * Sample model for Glowie application.
     * @category Model
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 0.3-alpha
     */
    class Table extends BaseModel{

        /**
         * Model table name.
         * @var string
         */
        protected $table = 'glowie';

        /**
         * Table primary key name.
         * @var string
         */
        protected $primaryKey = 'id';

        /**
         * Table manageable fields.
         * @var string[]
         */
        protected $fields = ['id', 'name', 'status'];

    }

?>