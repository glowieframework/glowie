<?php
    namespace Glowie\Migrations;

    use Glowie\Core\Database\Migration;
    use Glowie\Core\Database\Skeleton;
    use Glowie\Core\Database\Kraken;

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
         * Runs the migration.
         * @return bool Returns true on success or false on errors.
         */
        public function run(){
            return $this->forge->table('users')
                ->ifNotExists()
                ->id()
                ->createColumn('email', 'VARCHAR', 255)
                ->createColumn('password', 'VARCHAR', 255)
                ->createTimestamps()
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