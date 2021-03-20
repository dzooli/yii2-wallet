<?php

use yii\db\Schema;
use yii\db\Migration;

class m210316_140508_icon_typeDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%icon_type}}',
                           ["type"],
                            [
    [
        'type' => 'file',
    ],
    [
        'type' => 'font',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%icon_type}} CASCADE');
    }
}
