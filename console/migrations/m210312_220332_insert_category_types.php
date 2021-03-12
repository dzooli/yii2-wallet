<?php

use yii\db\Migration;

/**
 * Class m210312_220332_insert_category_types
 */
class m210312_220332_insert_category_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'category_type',
            ['name'],
            [
                ['Shopping'],
                ['Restaurant'],
                ['Household'],
                ['Holidays'],
                ['Culture']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('category_type', ['not', ['id' => 0]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210312_220332_insert_category_types cannot be reverted.\n";

        return false;
    }
    */
}
