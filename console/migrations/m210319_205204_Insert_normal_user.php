<?php

use yii\db\Migration;

/**
 * Class m210319_205204_Insert_normal_user
 */
class m210319_205204_Insert_normal_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'id' => 2,
            'username' => 'user',
            'email' => 'user@users.com',
            'password_hash' => '$2y$12$BJu3H91IIWNKhcmfK7QnkeUUB90FTEl4xb12cVvWAuV6dJXGho8JS',
            'auth_key' => 'vYghSpiPCeP60_jCLo9hIVrGlFUMY3xJ',
            'confirmed_at' => '1524426563',
            'created_at' => '1524426563',
            'updated_at' => '1524426563',
            'flags' => '0',
        ]);

        $this->insert('{{%profile}}', [
            'user_id' => '2'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['id' => 2]);
        $this->delete('{{%profile}}', ['id' => 2]);

        return true;
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210319_205204_Insert_normal_user cannot be reverted.\n";

        return false;
    }
    */
}
