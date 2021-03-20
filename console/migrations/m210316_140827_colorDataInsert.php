<?php

use yii\db\Schema;
use yii\db\Migration;

class m210316_140827_colorDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%color}}',
                           ["name", "value"],
                            [
    [
        'name' => 'green',
        'value' => '00FF00',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%color}} CASCADE');
    }
}
