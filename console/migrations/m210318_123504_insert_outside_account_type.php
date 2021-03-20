<?php

use yii\db\Migration;

/**
 * Class m210318_123504_insert_outside_account_type
 */
class m210318_123504_insert_outside_account_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'account_type',
            ['name'],
            [
                ['Outside'],
            ]
        );

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('account_type', ['name' => 'Outside']);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210318_123504_insert_outside_account_type cannot be reverted.\n";

        return false;
    }
    */
}
