<?php

use yii\db\Migration;

/**
 * Class m210312_220025_insert_icon_types
 */
class m210312_220025_insert_icon_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'icon_type',
            ['type'],
            [
                ['file'],
                ['font']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('icon_type', ['not', ['id' => 0]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210312_220025_insert_icon_types cannot be reverted.\n";

        return false;
    }
    */
}
