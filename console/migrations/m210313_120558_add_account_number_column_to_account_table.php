<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%account}}`.
 */
class m210313_120558_add_account_number_column_to_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%account}}', 'account_number', $this->string(35)->comment('Bank Account Number'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%account}}', 'account_number');
    }
}
