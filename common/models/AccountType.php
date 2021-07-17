<?php

namespace common\models;

use Yii;
use \common\models\base\AccountType as BaseAccountType;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "account_type".
 */
class AccountType extends BaseAccountType
{
    const TYPE_CREDIT = 1;
    const TYPE_DEBIT = 2;
    const TYPE_CASH = 3;
    const TYPE_ASSET = 4;
    const TYPE_LOAN = 5;
    const TYPE_RESOURCE = 6;
    const TYPE_OUTSIDE = 7;

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
