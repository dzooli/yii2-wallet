<?php

use yii\db\Migration;

/**
 * Class m210312_215224_insert_account_types
 */
class m210312_215224_insert_account_types extends Migration
{
    /**
     * {@inheritdoc}
     * ENUM('Credit', 'Debit', 'Cash', 'Asset', 'Resource', 'Loan')
     */
    public function safeUp()
    {
        $this->batchInsert(
            'account_type',
            ['name'],
            [
                ['Credit'],
                ['Debit'],
                ['Cash'],
                ['Asset'],
                ['Loan'],
                ['Resource']
            ]
        );

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('account_type', ['not', ['id' => 0]]);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210312_215224_insert_account_types cannot be reverted.\n";

        return false;
    }
    */
}
