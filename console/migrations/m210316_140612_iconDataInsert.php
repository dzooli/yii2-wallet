<?php

use yii\db\Schema;
use yii\db\Migration;

class m210316_140612_iconDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%icon}}',
                           ["icon_type_id", "icon_image_id"],
                            [
    [
        'icon_type_id' => '2',
        'icon_image_id' => '1',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%icon}} CASCADE');
    }
}
