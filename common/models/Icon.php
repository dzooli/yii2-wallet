<?php

namespace common\models;

use Yii;
use \common\models\base\Icon as BaseIcon;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "icon".
 */
class Icon extends BaseIcon
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
