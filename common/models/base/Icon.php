<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "icon".
 *
 * @property integer $id
 * @property integer $icon_type_id
 * @property integer $icon_image_id
 *
 * @property \common\models\Account[] $accounts
 * @property \common\models\Category[] $categories
 * @property \common\models\IconImage $iconImage
 * @property \common\models\IconType $iconType
 * @property string $aliasModel
 */
abstract class Icon extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icon_type_id', 'icon_image_id'], 'required'],
            [['icon_type_id', 'icon_image_id'], 'integer'],
            [['icon_image_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\IconImage::className(), 'targetAttribute' => ['icon_image_id' => 'id']],
            [['icon_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\IconType::className(), 'targetAttribute' => ['icon_type_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon_type_id' => 'Type',
            'icon_image_id' => 'Image',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'icon_type_id' => 'Icon type could be a filename or a glyphicon name',
            'icon_image_id' => 'Icon image or glyph name',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(\common\models\Account::className(), ['icon_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(\common\models\Category::className(), ['icon_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIconImage()
    {
        return $this->hasOne(\common\models\IconImage::className(), ['id' => 'icon_image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIconType()
    {
        return $this->hasOne(\common\models\IconType::className(), ['id' => 'icon_type_id']);
    }



    /**
     * @inheritdoc
     * @return \common\models\IconQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\IconQuery(get_called_class());
    }
}