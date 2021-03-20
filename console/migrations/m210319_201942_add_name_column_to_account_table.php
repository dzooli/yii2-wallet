<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%account}}`.
 */
class m210319_201942_add_name_column_to_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%account}}', 'name', 'string(80) NOT NULL');
        $this->addCommentOnColumn('{{%account}}', 'name', "Account's friendly name");
        $this->addDefaultValue('account_default_name', '{{%account}}', 'name', 'My pocket');

        $this->createIndex(
            '{{%idx-account-name}}',
            '{{%account}}',
            'name'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%idx-account-name}}', '{{%account}}');
        $this->dropColumn('{{%account}}', 'name');
    }
}
