<?php

namespace common\models;

use Yii;

use common\models\AccountType;
use common\models\Account;

use common\exceptions\AccountCreationErrorException;
use dektrium\user\models\User as BaseUser;

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
        return (in_array('Outside', $accTypes)) && in_array('Cash', $accTypes);
    }

    public function createDefaultAccounts()
    {
        $accounts = [];
        for ($i = 0; $i < 2; $i++) {
            $accounts[] = new Account([
                'user_id' => $this->id,
                'icon_id' => 1, 'color_id' => 1,
                'balance' => 0.0,
                'default_currency' => 1,
            ]);
        }
        $accounts[0]->name = 'My pocket';
        $accounts[0]->account_type_id = AccountType::TYPE_CASH;
        $accounts[1]->name = 'Outside';
        $accounts[1]->account_type_id = AccountType::TYPE_OUTSIDE;

        foreach ($accounts as $acc) {
            if (!$acc->save()) {
                $errors = json_encode($acc->getErrors());
                Yii::error($errors, 'wallet');
                throw new AccountCreationErrorException($errors);
            }
        }
        $this->refresh();
    }

    public function getAccounts()
    {
        return $this->hasMany($this->module->modelMap['Account'], ['user_id' => 'id'])->all();
    }
}
