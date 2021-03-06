<?php

namespace common\models;

use common\models\base\Account as BaseAccount;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "account".
 */
class Account extends BaseAccount
{
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
