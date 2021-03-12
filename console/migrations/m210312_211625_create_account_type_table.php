<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account_type}}`.
 */
class m210312_211625_create_account_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%account_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%account_type}}');
    }
}
