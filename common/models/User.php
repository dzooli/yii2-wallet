<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Account;
use common\models\AccountType;
use common\exceptions\AccountCreationErrorException;
use dektrium\user\models\User as BaseUser;

/**
 * The user class is derived from dektrium\user\models\User
 *
 * Used for easy user registration and login handling with enhanced security,
 * password reset functionality and remember password generation and confirmation
 * of the registration.
 *
 * @package common\models
 *
 * @property common\models\Account $accounts
 */
class User extends BaseUser
{
    /**
     * Retrieves the existing account types
     *
     * @return array The user's existing account types
     */
    public function getAccountTypes()
    {
        return ArrayHelper::getColumn($this->accounts, 'account_type_id', false);
    }

    /**
     * Checks the default accounts existence (cash, credit and outside is required for everybody)
     *
     * @return boolean
     */
    public function hasDefaultAccounts(): bool
    {
        $accTypes = $this->getAccountTypes();
        return in_array(AccountType::TYPE_CREDIT, $accTypes) &&
                in_array(AccountType::TYPE_CASH, $accTypes) &&
                in_array(AccountType::TYPE_OUTSIDE, $accTypes);
    }

    /**
     * Creates the default accounts for the user
     *
     * @return void
     * @throws AccountCreationErrorException
     */
    public function createDefaultAccounts()
    {
        $accounts = [];
        for ($i = 0; $i < 3; $i++) {
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
        $accounts[2]->name = 'Bank account';
        $accounts[2]->account_type_id = AccountType::TYPE_CREDIT;


        foreach ($accounts as $acc) {
            if (!$acc->save()) {
                $errors = json_encode($acc->getErrors());
                Yii::error($errors, 'wallet');
                throw new AccountCreationErrorException($errors);
            }
        }
        Yii::info('Default accounts has been created for ' . $this->id, 'wallet');
        $this->refresh();
    }

    /**
     * Defines the relation between the user and the accounts (Yii2 way)
     *
     * @return void
     */
    public function getAccounts()
    {
        return $this->hasMany($this->module->modelMap['Account'], ['user_id' => 'id'])->all();
    }
}
