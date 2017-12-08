<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_access_tokens`.
 */
class m171207_171831_create_user_access_tokens_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_access_tokens', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'token' => $this->string()->notNull(),
            'expire' => $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_access_tokens');
    }
}
