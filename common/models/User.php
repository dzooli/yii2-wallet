<?php

namespace common\models;

use dektrium\user\models\User as BaseUser;
use Exception;
use yii\helpers\ArrayHelper;

/**
 * Class User
 * @package common\models
 * 
 * @property common\models\Account $accounts
 */
class User extends BaseUser
{
    public function getAccountTypes()
    {
        $result = [];
        foreach ($this->accounts as $account) {
            $result[] = $account->accountType->name;
        }
        return $result;
    }

    public function checkDefaultAccounts(): bool
    {
        $accTypes = $this->getAccountTypes();
        return (in_array('Credit', $accTypes)) && in_array('Cash', $accTypes);
    }

    public function createDefaultAccounts()
    {
        // throw new Exception('Test account creation called.');
    }

    public function getAccounts()
    {
        return $this->hasMany($this->module->modelMap['Account'], ['user_id' => 'id'])->all();
    }
}
