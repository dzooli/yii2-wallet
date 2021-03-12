<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category_type}}`
 * - `{{%icon}}`
 * - `{{%color}}`
 */
class m210312_212231_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(80)->notNull(),
            'category_type_id' => $this->integer()->notNull(),
            'icon_id' => $this->integer()->notNull(),
            'color_id' => $this->integer()->notNull(),
        ]);
        $this->addCommentOnColumn('{{%category}}', 'category_type_id', 'Kind of Category');
        $this->addCommentOnColumn('{{%category}}', 'icon_id', 'Icon');
        $this->addCommentOnColumn('{{%category}}', 'color_id', 'Color');

        // creates index for column `category_type_id`
        $this->createIndex(
            '{{%idx-category-category_type_id}}',
            '{{%category}}',
            'category_type_id'
        );

        // add foreign key for table `{{%category_type}}`
        $this->addForeignKey(
            '{{%fk-category-category_type_id}}',
            '{{%category}}',
            'category_type_id',
            '{{%category_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `icon_id`
        $this->createIndex(
            '{{%idx-category-icon_id}}',
            '{{%category}}',
            'icon_id'
        );

        // add foreign key for table `{{%icon}}`
        $this->addForeignKey(
            '{{%fk-category-icon_id}}',
            '{{%category}}',
            'icon_id',
            '{{%icon}}',
            'id',
            'CASCADE'
        );

        // creates index for column `color_id`
        $this->createIndex(
            '{{%idx-category-color_id}}',
            '{{%category}}',
            'color_id'
        );

        // add foreign key for table `{{%color}}`
        $this->addForeignKey(
            '{{%fk-category-color_id}}',
            '{{%category}}',
            'color_id',
            '{{%color}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category_type}}`
        $this->dropForeignKey(
            '{{%fk-category-category_type_id}}',
            '{{%category}}'
        );

        // drops index for column `category_type_id`
        $this->dropIndex(
            '{{%idx-category-category_type_id}}',
            '{{%category}}'
        );

        // drops foreign key for table `{{%icon}}`
        $this->dropForeignKey(
            '{{%fk-category-icon_id}}',
            '{{%category}}'
        );

        // drops index for column `icon_id`
        $this->dropIndex(
            '{{%idx-category-icon_id}}',
            '{{%category}}'
        );

        // drops foreign key for table `{{%color}}`
        $this->dropForeignKey(
            '{{%fk-category-color_id}}',
            '{{%category}}'
        );

        // drops index for column `color_id`
        $this->dropIndex(
            '{{%idx-category-color_id}}',
            '{{%category}}'
        );

        $this->dropTable('{{%category}}');
    }
}
