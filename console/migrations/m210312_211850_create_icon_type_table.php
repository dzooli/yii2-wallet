<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%icon_type}}`.
 */
class m210312_211850_create_icon_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%icon_type}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(20)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%icon_type}}');
    }
}
