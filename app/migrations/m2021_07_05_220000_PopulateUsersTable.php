<?php
    namespace Glowie\Migrations;

    use Glowie\Core\Database\Migration;

    /**
     * Sample migration for Glowie application.
     * @category Migration
     * @package glowieframework/glowie
     * @author Glowie
     * @copyright Copyright (c) Glowie
     * @license MIT
     * @link https://eugabrielsilva.tk/glowie
     */
    class m2021_07_05_220000_PopulateUsersTable extends Migration{

        /**
         * Runs the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function run(){
            return $this->db->table('users')->insert([
                [
                    'name' => 'Lorem Ipsum',
                    'email' => 'lorem@ipsum.com',
                    'password' => password_hash('123', PASSWORD_DEFAULT)
                ],
                [
                    'name' => 'Jane Doe',
                    'email' => 'janedoe@gmail.com',
                    'password' => password_hash('jane@2021', PASSWORD_DEFAULT)
                ],
                [
                    'name' => 'John Oliver',
                    'email' => 'john_oliver@hotmail.com',
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