<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%icon_image}}`.
 */
class m210312_211820_create_icon_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%icon_image}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%icon_image}}');
    }
}
