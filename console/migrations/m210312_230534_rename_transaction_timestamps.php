<?php

use yii\db\Migration;

/**
 * Class m210312_230534_rename_transaction_timestamps
 */
class m210312_230534_rename_transaction_timestamps extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%transaction}}', 'create_time', 'created_at');
        $this->renameColumn('{{%transaction}}', 'update_time', 'updated_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('{{%transaction}}', 'created_at', 'create_time');
        $this->renameColumn('{{%transaction}}', 'updated_at', 'update_time');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210312_230534_rename_transaction_timestamps cannot be reverted.\n";

        return false;
    }
    */
}
