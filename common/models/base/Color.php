<?php

// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use common\models\Account;
use common\models\Category;
use common\models\ColorQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the base-model class for table "color".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 *
 * @property Account[] $accounts
 * @property Category[] $categories
 * @property string $aliasModel
 */
abstract class Color extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['value'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'HEX Value',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'value' => 'HEX Value',
        ]);
    }

    /**
     * @return ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::class, ['color_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['color_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ColorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ColorQuery(get_called_class());
    }
}
