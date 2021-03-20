<?php

use yii\db\Schema;
use yii\db\Migration;

class m210316_140540_icon_imageDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%icon_image}}',
                           ["name"],
                            [
    [
        'name' => 'credit-card',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%icon_image}} CASCADE');
    }
}
