<?php
    namespace Glowie\Models;

    use Glowie\Core\Model;

    /**
     * Sample model for Glowie application.
     * @category Model
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class Users extends Model{

        /**
         * Model table name.
         * @var string
         */
        protected $_table = 'users';

        /**
         * Table primary key name.
         * @var string
         */
        protected $_primaryKey = 'id';

        /**
         * Table manageable fields.
         * @var string[]
         */
        protected $_fields = ['id', 'email', 'password'];

        /**
         * Handle timestamp fields.
         * @var bool
         */
        protected $_timestamps = true;

    }

?>