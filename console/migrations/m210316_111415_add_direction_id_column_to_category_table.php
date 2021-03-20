<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%direction}}`
 */
class m210316_111415_add_direction_id_column_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category}}', 'direction_id', $this->integer()->comment('Transaction Direction'));

        // creates index for column `direction_id`
        $this->createIndex(
            '{{%idx-category-direction_id}}',
            '{{%category}}',
            'direction_id'
        );

        // add foreign key for table `{{%direction}}`
        $this->addForeignKey(
            '{{%fk-category-direction_id}}',
            '{{%category}}',
            'direction_id',
            '{{%direction}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%direction}}`
        $this->dropForeignKey(
            '{{%fk-category-direction_id}}',
            '{{%category}}'
        );

        // drops index for column `direction_id`
        $this->dropIndex(
            '{{%idx-category-direction_id}}',
            '{{%category}}'
        );

        $this->dropColumn('{{%category}}', 'direction_id');
    }
}
