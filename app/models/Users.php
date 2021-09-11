<?php
    namespace Glowie\Models;

    use Glowie\Core\Database\Model;

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
         * @var array
         */
        protected $_fields = ['id', 'email', 'password'];

        /**
         * Handle timestamp fields.
         * @var bool
         */
        protected $_timestamps = true;

        /**
         * **Created at** field name (if timestamps enabled).
         * @var string
         */
        protected $_createdField = 'created_at';

        /**
         * **Updated at** field name (if timestamps enabled).
         * @var string
         */
        protected $_updatedField = 'updated_at';

    }

?>