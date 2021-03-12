<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%icon}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%icon_type}}`
 * - `{{%icon_image}}`
 */
class m210312_212040_create_icon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%icon}}', [
            'id' => $this->primaryKey(),
            'icon_type_id' => $this->integer()->notNull(),
            'icon_image_id' => $this->integer()->notNull(),
        ]);
        $this->addCommentOnColumn('{{%icon}}', 'icon_type_id', 'Icon Type');
        $this->addCommentOnColumn('{{%icon}}', 'icon_image_id', 'Icon Image');

        // creates index for column `icon_type_id`
        $this->createIndex(
            '{{%idx-icon-icon_type_id}}',
            '{{%icon}}',
            'icon_type_id'
        );

        // add foreign key for table `{{%icon_type}}`
        $this->addForeignKey(
            '{{%fk-icon-icon_type_id}}',
            '{{%icon}}',
            'icon_type_id',
            '{{%icon_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `icon_image_id`
        $this->createIndex(
            '{{%idx-icon-icon_image_id}}',
            '{{%icon}}',
            'icon_image_id'
        );

        // add foreign key for table `{{%icon_image}}`
        $this->addForeignKey(
            '{{%fk-icon-icon_image_id}}',
            '{{%icon}}',
            'icon_image_id',
            '{{%icon_image}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%icon_type}}`
        $this->dropForeignKey(
            '{{%fk-icon-icon_type_id}}',
            '{{%icon}}'
        );

        // drops index for column `icon_type_id`
        $this->dropIndex(
            '{{%idx-icon-icon_type_id}}',
            '{{%icon}}'
        );

        // drops foreign key for table `{{%icon_image}}`
        $this->dropForeignKey(
            '{{%fk-icon-icon_image_id}}',
            '{{%icon}}'
        );

        // drops index for column `icon_image_id`
        $this->dropIndex(
            '{{%idx-icon-icon_image_id}}',
            '{{%icon}}'
        );

        $this->dropTable('{{%icon}}');
    }
}
