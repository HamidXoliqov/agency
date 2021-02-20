<?php

namespace app\modules\manuals\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ExchangeRateSearch represents the model behind the search form of `app\modules\manuals\models\ExchangeRate`.
 */
class ExchangeRateSearch extends ExchangeRate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'currency_id', 'to_currency_id'], 'integer'],
            [['currency_id', 'to_currency_id','status'], 'safe'],
            [['amount', 'to_amount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @return ActiveDataProvider
     */
    public function search()
    {
        $params = Yii::$app->request->post();
        $query = ExchangeRate::find()->where(['!=','status',self::STATUS_DELETED]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' =>$this->status,
            'currency_id' => $this->currency_id,
            'amount' => $this->amount,
            'to_currency_id' => $this->to_currency_id,
            'to_amount' => $this->to_amount,
        ]);

        return $dataProvider;
    }
}
