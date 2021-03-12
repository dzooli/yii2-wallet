<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_type}}`.
 */
class m210312_210948_create_category_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_type}}');
    }
}
