<?php

use yii\db\Schema;
use yii\db\Migration;

class m210316_140911_accountDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%account}}',
                           ["user_id", "account_type_id", "icon_id", "color_id", "balance", "default_currency"],
                            [
    [
        'user_id' => '1',
        'account_type_id' => '1',
        'icon_id' => '1',
        'color_id' => '1',
        'balance' => '0.0000',
        'default_currency' => '1',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%account}} CASCADE');
    }
}
