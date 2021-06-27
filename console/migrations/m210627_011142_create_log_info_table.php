<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%log_info}}`.
 */
class m210627_011142_create_log_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%log_info}}', [
            'id' => $this->primaryKey(),
            'level' => $this->integer(),
            'category' => $this->string(255),
            'log_time' => $this->double(),
            'prefix' => $this->text(),
            'message' => $this->text(),
        ]);
        $this->createIndex('idx_log_level', 'log_info', ['level'], false);
        $this->createIndex('idx_log_category', 'log_info', ['category'], false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_log_level', 'log_info');
        $this->dropIndex('idx_log_category', 'log_info');
        $this->dropTable('{{%log_info}}');
    }
}
