<?php

namespace Glowie\Migrations;

use Glowie\Core\Database\Migration;
use Glowie\Core\Database\Skeleton;

/**
 * Sample migration for Glowie application.
 * @category Migration
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class m2021_07_05_210000_CreateUsersTable extends Migration
{

    /**
     * Runs the migration.
     * @return bool Returns true on success or false on errors.
     */
    public function run()
    {
        return $this->forge->table('users')
            ->id()
            ->createColumn('name', Skeleton::TYPE_STRING, 255)
            ->createColumn('email', Skeleton::TYPE_STRING, 255)->unique('email')
            ->createColumn('password', Skeleton::TYPE_TEXT)
            ->createTimestamps()
            ->createSoftDeletes()
            ->ifNotExists()
            ->create();
    }

    /**
     * Rolls back the migration.
     * @return bool Returns true on success or false on errors.
     */
    public function rollback()
    {
        return $this->forge->table('users')
            ->ifExists()
            ->drop();
    }
}
