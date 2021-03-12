<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%account_type}}`
 * - `{{%icon}}`
 * - `{{%color}}`
 */
class m210312_212801_create_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%account}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'account_type_id' => $this->integer()->notNull(),
            'icon_id' => $this->notNull(),
            'color_id' => $this->notNull(),
            'balance' => $this->money()->notNull(),
            'default_currency' => $this->integer()->notNull()
        ]);
        $this->addCommentOnColumn('{{%account}}', 'user_id', 'Owner');
        $this->addCommentOnColumn('{{%account}}', 'icon_id', 'Icon');
        $this->addCommentOnColumn('{{%account}}', 'color_id', 'Color');
        $this->addCommentOnColumn('{{%account}}', 'balance', 'Current Balance');
        $this->addCommentOnColumn('{{%account}}', 'default_currency', 'Currency');

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-account-user_id}}',
            '{{%account}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-account-user_id}}',
            '{{%account}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `account_type_id`
        $this->createIndex(
            '{{%idx-account-account_type_id}}',
            '{{%account}}',
            'account_type_id'
        );

        // add foreign key for table `{{%account_type}}`
        $this->addForeignKey(
            '{{%fk-account-account_type_id}}',
            '{{%account}}',
            'account_type_id',
            '{{%account_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `icon_id`
        $this->createIndex(
            '{{%idx-account-icon_id}}',
            '{{%account}}',
            'icon_id'
        );

        // add foreign key for table `{{%icon}}`
        $this->addForeignKey(
            '{{%fk-account-icon_id}}',
            '{{%account}}',
            'icon_id',
            '{{%icon}}',
            'id',
            'CASCADE'
        );

        // creates index for column `color_id`
        $this->createIndex(
            '{{%idx-account-color_id}}',
            '{{%account}}',
            'color_id'
        );

        // add foreign key for table `{{%color}}`
        $this->addForeignKey(
            '{{%fk-account-color_id}}',
            '{{%account}}',
            'color_id',
            '{{%color}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            '{{%idx-account-currency_id}}',
            '{{%account}}',
            'currency_id'
        );

        $this->addForeignKey(
            '{{%fk-account-currency_id}}',
            '{{%account}}',
            'currency_id',
            '{{%currency}}',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-account-user_id}}',
            '{{%account}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-account-user_id}}',
            '{{%account}}'
        );

        // drops foreign key for table `{{%account_type}}`
        $this->dropForeignKey(
            '{{%fk-account-account_type_id}}',
            '{{%account}}'
        );

        // drops index for column `account_type_id`
        $this->dropIndex(
            '{{%idx-account-account_type_id}}',
            '{{%account}}'
        );

        // drops foreign key for table `{{%icon}}`
        $this->dropForeignKey(
            '{{%fk-account-icon_id}}',
            '{{%account}}'
        );

        // drops index for column `icon_id`
        $this->dropIndex(
            '{{%idx-account-icon_id}}',
            '{{%account}}'
        );

        // drops foreign key for table `{{%color}}`
        $this->dropForeignKey(
            '{{%fk-account-color_id}}',
            '{{%account}}'
        );

        // drops index for column `color_id`
        $this->dropIndex(
            '{{%idx-account-color_id}}',
            '{{%account}}'
        );

        $this->dropTable('{{%account}}');
    }
}
