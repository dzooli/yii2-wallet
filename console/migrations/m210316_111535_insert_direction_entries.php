<?php

use yii\db\Migration;

/**
 * Class m210316_111535_insert_direction_entries
 */
class m210316_111535_insert_direction_entries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'direction',
            ['abbreviation', 'description'],
            [
                ['OUT', 'Out from the source account'],
                ['IN', 'Into the source account'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('direction', ['not', ['id' => 0]]);
    }
}
