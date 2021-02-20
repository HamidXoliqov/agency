<?php

namespace app\modules\subsidy\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\subsidy\models\AppealProtocol;

/**
 * AppealProtocolSearch represents the model behind the search form of `app\modules\subsidy\models\AppealProtocol`.
 */
class AppealProtocolSearch extends AppealProtocol
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'appeal_id', 'subsidy_protocol_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['total_sum', 'self_sum'], 'number'],
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
        $query = AppealProtocol::find();

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
            'subsidy_protocol_id' => $this->subsidy_protocol_id,
            'total_sum' => $this->total_sum,
            'self_sum' => $this->self_sum,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
