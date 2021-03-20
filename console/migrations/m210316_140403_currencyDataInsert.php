<?php

use yii\db\Schema;
use yii\db\Migration;

class m210316_140403_currencyDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%currency}}',
                           ["abbreviation", "name"],
                            [
    [
        'abbreviation' => 'HUF',
        'name' => 'Hungarian Forint',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%currency}} CASCADE');
    }
}
