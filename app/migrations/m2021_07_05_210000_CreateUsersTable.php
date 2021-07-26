<?php
    namespace Glowie\Migrations;

    use Glowie\Core\Database\Migration;

    /**
     * Sample migration for Glowie application.
     * @category Migration
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://glowie.tk
     * @version 1.0
     */
    class m2021_07_05_210000_CreateUsersTable extends Migration{

        /**
         * This method will be called before any other methods from this migration.
         */
        public function init(){
            //
        }

        /**
         * Runs the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function run(){
            return $this->db->query(
                'CREATE TABLE IF NOT EXISTS users(
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    email VARCHAR(255) NOT NULL,
                    password VARCHAR(255) NOT NULL,
                    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
                    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
                )');
        }

        /**
         * Rolls back the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function rollback(){
            return $this->db->query('DROP TABLE IF EXISTS users');
        }

    }

?>