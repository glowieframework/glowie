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
    class m2021_07_05_220000_PopulateUsersTable extends Migration{

        /**
         * Runs the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function run(){
            return $this->db->table('users')->insert([
                [
                    'email' => 'lorem@ipsum.com',
                    'password' => password_hash('123', PASSWORD_DEFAULT)
                ],
                [
                    'email' => 'janedoe@gmail.com',
                    'password' => password_hash('jane@2021', PASSWORD_DEFAULT)
                ],
                [
                    'email' => 'john_oliver@glowie.tk',
                    'password' => password_hash('iloveburrito', PASSWORD_DEFAULT)
                ]
            ]);
        }

        /**
         * Rolls back the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function rollback(){
            return $this->forge->table('users')->truncate();
        }

    }

?>