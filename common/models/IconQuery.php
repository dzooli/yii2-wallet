<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Icon]].
 *
 * @see Icon
 */
class IconQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Icon[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Icon|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
