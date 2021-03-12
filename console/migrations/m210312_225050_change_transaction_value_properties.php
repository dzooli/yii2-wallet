<?php

use yii\db\Migration;

/**
 * Class m210312_225050_change_transaction_value_properties
 */
class m210312_225050_change_transaction_value_properties extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%transaction}}', 'value', 'money not null');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210312_225050_change_transaction_value_properties cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210312_225050_change_transaction_value_properties cannot be reverted.\n";

        return false;
    }
    */
}
