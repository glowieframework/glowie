<?php
    namespace Glowie\Migrations;

    use Glowie\Core\Migration;

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
    class m2021_07_05_220000_PopulateUsersTable extends Migration{

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
            return $this->db->table('users')->insert([
                ['email' => 'lorem@ipsum.com', 'password' => md5('123')],
                ['email' => 'janedoe@gmail.com', 'password' => md5('jane@2021')],
                ['email' => 'john_oliver@glowie.tk', 'password' => md5('burrito')]
            ]);
        }

        /**
         * Rolls back the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function rollback(){
            return $this->db->query('TRUNCATE TABLE users');
        }

    }

?>