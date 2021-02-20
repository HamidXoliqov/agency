<?php

namespace app\modules\project\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\project\models\Project3Point;

/**
 * Project3PointSearch represents the model behind the search form of `app\modules\project\models\Project3Point`.
 */
class Project3PointSearch extends Project3Point
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'district_id', 'project_id', 'order_number'], 'integer'],
            [['address1', 'address2'], 'safe'],
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
        $query = Project3Point::find();

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
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'project_id' => $this->project_id,
            'order_number' => $this->order_number,
        ]);

        $query->andFilterWhere(['ilike', 'address1', $this->address1])
            ->andFilterWhere(['ilike', 'address2', $this->address2]);

        return $dataProvider;
    }
}
