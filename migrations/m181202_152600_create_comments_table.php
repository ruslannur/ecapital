<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m181202_152600_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'user_name' => $this->string(255)->notNull(),
            'content' => $this->text(),
            'created_at' => $this->datetime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comments');
    }
}
