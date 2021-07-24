<?php

// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use common\models\Icon;
use common\models\IconTypeQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the base-model class for table "icon_type".
 *
 * @property integer $id
 * @property string $type
 *
 * @property Icon[] $icons
 * @property string $aliasModel
 */
abstract class IconType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icon_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getIcons()
    {
        return $this->hasMany(Icon::class, ['icon_type_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return IconTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IconTypeQuery(get_called_class());
    }
}
