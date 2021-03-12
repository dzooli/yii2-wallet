<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%color}}`.
 */
class m210312_211737_create_color_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%color}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull(),
            'value' => $this->string(6)->notNull(),
        ]);
        $this->addCommentOnColumn('{{%color}}', 'value', 'HEX Value');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%color}}');
    }
}
