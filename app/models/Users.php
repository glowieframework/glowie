<?php
    namespace Glowie\Models;

    use Glowie\Core\Database\Model;

    /**
     * Sample model for Glowie application.
     * @category Model
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://gabrielsilva.dev.br/glowie
     */
    class Users extends Model{

        /**
         * Model table name.
         * @var string
         */
        protected $_table = 'users';

        /**
         * Model database connection name (from your app configuration).
         * @var string
         */
        protected $_database = 'default';

        /**
         * Table primary key name.
         * @var string
         */
        protected $_primaryKey = 'id';

        /**
         * Enable the use of UUIDs in the table.
         * @var bool
         */
        protected $_uuid = false;

        /**
         * Table retrievable fields.
         * @var array
         */
        protected $_fields = [];

        /**
         * Table updatable fields.
         * @var array
         */
        protected $_updatable = ['name', 'email', 'password'];

        /**
         * Initial model attributes.
         * @var array
         */
        protected $_attributes = [];

        /**
         * Table fields data types to cast.
         * @var array
         */
        protected $_casts = ['id' => 'int'];

        /**
         * Table fields data types to mutate.
         * @var array
         */
        protected $_mutators = [];

        /**
         * Handle timestamp fields.
         * @var bool
         */
        protected $_timestamps = true;

        /**
         * Timestamp fields date format.
         * @var string
         */
        protected $_dateFormat = 'Y-m-d H:i:s';

        /**
         * Use soft deletes in the table.
         * @var bool
         */
        protected $_softDeletes = true;

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

        /**
         * **Deleted at** field name (if soft deletes enabled).
         * @var string
         */
        protected $_deletedField = 'deleted_at';

    }

?>