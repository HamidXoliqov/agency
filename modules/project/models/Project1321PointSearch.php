<?php

namespace app\modules\project\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\project\models\Project1321Point;

/**
 * Project1321PointSearch represents the model behind the search form of `app\modules\project\models\Project1321Point`.
 */
class Project1321PointSearch extends Project1321Point
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'order_number'], 'integer'],
            [['assimilation_forecast_year', 'assimilation_forecast', 'mastered_fact'], 'safe'],
            [['cmr', 'equipment', 'import', 'other', 'predict_period', 'forecast_year'], 'number'],
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
        $query = Project1321Point::find();

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
            'cmr' => $this->cmr,
            'equipment' => $this->equipment,
            'import' => $this->import,
            'other' => $this->other,
            'predict_period' => $this->predict_period,
            'forecast_year' => $this->forecast_year,
            'project_id' => $this->project_id,
            'order_number' => $this->order_number,
        ]);

        $query->andFilterWhere(['ilike', 'assimilation_forecast_year', $this->assimilation_forecast_year])
            ->andFilterWhere(['ilike', 'assimilation_forecast', $this->assimilation_forecast])
            ->andFilterWhere(['ilike', 'mastered_fact', $this->mastered_fact]);

        return $dataProvider;
    }
}
