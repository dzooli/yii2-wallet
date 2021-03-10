<?php

use yii\db\Migration;

/**
 * Class m210310_124703_init_rbac
 */
class m210310_124703_init_rbac extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;
        $qmanagerModule = $auth->createPermission('queuemanager-module-access');
        $qmanagerModule->description = 'Access to the Queuemanager admin page';
        $auth->add($qmanagerModule);

        $qmadmin = $auth->createRole('queuemanager-module');
        $auth->add($qmadmin);
        $auth->addChild($qmadmin, $qmanagerModule);
        $auth->assign($qmadmin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $qmadmin = $auth->getRole('queuemanager-module');
        $auth->revoke($qmadmin, 1);

        return false;
    }
}
