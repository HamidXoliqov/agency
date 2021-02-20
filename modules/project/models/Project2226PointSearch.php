<?php

namespace app\modules\project\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\project\models\Project2226Point;

/**
 * Project2226PointSearch represents the model behind the search form of `app\modules\project\models\Project2226Point`.
 */
class Project2226PointSearch extends Project2226Point
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'order_number'], 'integer'],
            [['forecast_attracting_finance', 'Forecast_attracting_finance', 'involved fact', 'forecast_period', 'forecast_year'], 'number'],
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
        $query = Project2226Point::find();

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
            'forecast_attracting_finance' => $this->forecast_attracting_finance,
            'Forecast_attracting_finance' => $this->Forecast_attracting_finance,
            'involved fact' => $this->involved fact,
            'forecast_period' => $this->forecast_period,
            'forecast_year' => $this->forecast_year,
            'project_id' => $this->project_id,
            'order_number' => $this->order_number,
        ]);

        return $dataProvider;
    }
}
