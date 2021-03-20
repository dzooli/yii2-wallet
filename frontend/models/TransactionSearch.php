<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transaction;

/**
 * TransactionSearch represents the model behind the search form about `common\models\Transaction`.
 */
class TransactionSearch extends Transaction
{
    public $category_name;

    public function rules()
    {
        return [
            [['id', 'account_id', 'category_id', 'target_id', 'currency_id'], 'integer'],
            [['created_at', 'updated_at', 'category_name',], 'safe'],
            [['value'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Transaction::find();
        $query->joinWith(['category']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['category_name'] =
            [
                'asc' => ['category.name' => SORT_ASC],
                'desc' => ['category.name' => SORT_DESC],
            ];

        $user = Yii::$app->user->identity ?? null;
        $accountIds = [0];  // Do not show transactions if nobody is logged in
        if ($user) {
            $accountIds = ArrayHelper::getColumn($user->accounts, 'id');
        }
        // Get only the owned account data for the frontend
        $query->andWhere(['or', ['account_id' => $accountIds], ['target_id' => $accountIds]]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere([
            'id' => $this->id,
            //    'account_id' => $this->account_id,
            //    'target_id' => $this->target_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'value' => $this->value,
            'currency_id' => $this->currency_id,
        ]);
        $query->andFilterWhere(['like', 'category.name', $this->category_name]);

        return $dataProvider;
    }
}
