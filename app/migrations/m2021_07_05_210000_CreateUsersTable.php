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
    class m2021_07_05_210000_CreateUsersTable extends Migration{

        /**
         * Runs the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function run(){
            return $this->forge->table('users')
                ->id()
                ->createColumn('name', 'VARCHAR', 255)
                ->createColumn('email', 'VARCHAR', 255)
                ->createColumn('password', 'VARCHAR', 255)
                ->createTimestamps()
                ->createSoftDeletes()
                ->ifNotExists()
                ->create();
        }

        /**
         * Rolls back the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function rollback(){
            return $this->forge->table('users')->ifExists()->drop();
        }

    }

?>