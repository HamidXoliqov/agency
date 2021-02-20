<?php

namespace app\modules\project\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\project\models\Project811Point;

/**
 * Project811PointSearch represents the model behind the search form of `app\modules\project\models\Project811Point`.
 */
class Project811PointSearch extends Project811Point
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'order_number'], 'integer'],
            [['own_funds', 'fdi', 'fund_resources', 'bank_loans'], 'number'],
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
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Project811Point::find();

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
            'own_funds' => $this->own_funds,
            'fdi' => $this->fdi,
            'fund_resources' => $this->fund_resources,
            'bank_loans' => $this->bank_loans,
            'project_id' => $this->project_id,
            'order_number' => $this->order_number,
        ]);

        return $dataProvider;
    }
}
