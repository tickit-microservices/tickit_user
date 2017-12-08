<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m171207_170922_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'created' => $this->dateTime(),
            'modified' => $this->dateTime(),
            'created_by' => $this->dateTime(),
            'modified_by' => $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
