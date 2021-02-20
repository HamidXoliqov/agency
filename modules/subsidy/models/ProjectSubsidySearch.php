<?php

namespace app\modules\subsidy\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\subsidy\models\ProjectSubsidy;

/**
 * ProjectSubsidySearch represents the model behind the search form of `app\modules\subsidy\models\ProjectSubsidy`.
 */
class ProjectSubsidySearch extends ProjectSubsidy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'appeal_id', 'contragent_id', 'region_id', 'district_id', 'contur_number', 'counter_ga', 'water_pump_count', 'bonitet_ball', 'plant_schema_id', 'plant_all_count', 'job_count', 'project_all_price_currency_id', 'status_project', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['plant_all_area_ga', 'project_all_price'], 'number'],
            [['plant_address', 'end_date'], 'safe'],
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
        $query = ProjectSubsidy::find();

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
            'appeal_id' => $this->appeal_id,
            'contragent_id' => $this->contragent_id,
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'contur_number' => $this->contur_number,
            'counter_ga' => $this->counter_ga,
            'water_pump_count' => $this->water_pump_count,
            'bonitet_ball' => $this->bonitet_ball,
            'plant_all_area_ga' => $this->plant_all_area_ga,
            'plant_schema_id' => $this->plant_schema_id,
            'plant_all_count' => $this->plant_all_count,
            'end_date' => $this->end_date,
            'job_count' => $this->job_count,
            'project_all_price' => $this->project_all_price,
            'project_all_price_currency_id' => $this->project_all_price_currency_id,
            'status_project' => $this->status_project,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'plant_address', $this->plant_address]);

        return $dataProvider;
    }
}
