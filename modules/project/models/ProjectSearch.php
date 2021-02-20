<?php

namespace app\modules\project\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\project\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\modules\project\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'total_cost_currency_id', 'remain_on_year_begin_currency_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'lending_bank_id'], 'integer'],
            [['name', 'deadline_date', 'project_capacity', 'assimilation', 'production_time', 'delivery_time', 'installation_time', 'add_info'], 'safe'],
            [['total_cost', 'reamin_on_year_begin'], 'number'],
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
        $query = Project::find();

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
            'deadline_date' => $this->deadline_date,
            'total_cost' => $this->total_cost,
            'total_cost_currency_id' => $this->total_cost_currency_id,
            'reamin_on_year_begin' => $this->reamin_on_year_begin,
            'remain_on_year_begin_currency_id' => $this->remain_on_year_begin_currency_id,
            'production_time' => $this->production_time,
            'delivery_time' => $this->delivery_time,
            'installation_time' => $this->installation_time,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'lending_bank_id' => $this->lending_bank_id,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'project_capacity', $this->project_capacity])
            ->andFilterWhere(['ilike', 'assimilation', $this->assimilation])
            ->andFilterWhere(['ilike', 'add_info', $this->add_info]);

        return $dataProvider;
    }
}
