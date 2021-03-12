<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaction}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%account}}`
 * - `{{%category}}`
 * - `{{%account}}`
 * - `{{%currency}}`
 */
class m210312_213418_create_transaction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaction}}', [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'target_id' => $this->notNull(),
            'create_time' => $this->timestamp(),
            'update_time' => $this->timestamp(),
            'value' => $this->money(),
            'currency_id' => $this->notNull(),
        ]);
        $this->addCommentOnColumn('{{%transaction}}', 'target_id', 'Target Account');
        $this->addCommentOnColumn('{{%transaction}}', 'currency_id', 'Transaction Currency');
        $this->addCommentOnColumn('{{%transaction}}', 'account_id', 'Source Account');

        // creates index for column `account_id`
        $this->createIndex(
            '{{%idx-transaction-account_id}}',
            '{{%transaction}}',
            'account_id'
        );

        // add foreign key for table `{{%account}}`
        $this->addForeignKey(
            '{{%fk-transaction-account_id}}',
            '{{%transaction}}',
            'account_id',
            '{{%account}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-transaction-category_id}}',
            '{{%transaction}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-transaction-category_id}}',
            '{{%transaction}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `target_id`
        $this->createIndex(
            '{{%idx-transaction-target_id}}',
            '{{%transaction}}',
            'target_id'
        );

        // add foreign key for table `{{%account}}`
        $this->addForeignKey(
            '{{%fk-transaction-target_id}}',
            '{{%transaction}}',
            'target_id',
            '{{%account}}',
            'id',
            'CASCADE'
        );

        // creates index for column `currency_id`
        $this->createIndex(
            '{{%idx-transaction-currency_id}}',
            '{{%transaction}}',
            'currency_id'
        );

        // add foreign key for table `{{%currency}}`
        $this->addForeignKey(
            '{{%fk-transaction-currency_id}}',
            '{{%transaction}}',
            'currency_id',
            '{{%currency}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%account}}`
        $this->dropForeignKey(
            '{{%fk-transaction-account_id}}',
            '{{%transaction}}'
        );

        // drops index for column `account_id`
        $this->dropIndex(
            '{{%idx-transaction-account_id}}',
            '{{%transaction}}'
        );

        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-transaction-category_id}}',
            '{{%transaction}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-transaction-category_id}}',
            '{{%transaction}}'
        );

        // drops foreign key for table `{{%account}}`
        $this->dropForeignKey(
            '{{%fk-transaction-target_id}}',
            '{{%transaction}}'
        );

        // drops index for column `target_id`
        $this->dropIndex(
            '{{%idx-transaction-target_id}}',
            '{{%transaction}}'
        );

        // drops foreign key for table `{{%currency}}`
        $this->dropForeignKey(
            '{{%fk-transaction-currency_id}}',
            '{{%transaction}}'
        );

        // drops index for column `currency_id`
        $this->dropIndex(
            '{{%idx-transaction-currency_id}}',
            '{{%transaction}}'
        );

        $this->dropTable('{{%transaction}}');
    }
}
