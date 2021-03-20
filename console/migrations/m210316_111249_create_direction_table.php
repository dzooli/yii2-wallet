<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%direction}}`.
 */
class m210316_111249_create_direction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%direction}}', [
            'id' => $this->primaryKey(),
            'abbreviation' => $this->string(5)->comment('Direction Short Name'),
            'description' => $this->string(80)->comment('Description'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%direction}}');
    }
}
