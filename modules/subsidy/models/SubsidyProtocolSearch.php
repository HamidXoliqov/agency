<?php

namespace app\modules\subsidy\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\subsidy\models\SubsidyProtocol;

/**
 * SubsidyProtocolSearch represents the model behind the search form of `app\modules\subsidy\models\SubsidyProtocol`.
 */
class SubsidyProtocolSearch extends SubsidyProtocol
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'], //, 'protocol_date'
            [['protocol_number', 'file'], 'safe'],
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
        $query = SubsidyProtocol::find();

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
//        $query->andFilterWhere([">", "status", SubsidyProtocol::PROTOCOL_STATUS_NEW]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'protocol_date' => $this->protocol_date,
            'status' => $this->status,
//            'created_at' => $this->created_at,
//            'created_by' => $this->created_by,
//            'updated_at' => $this->updated_at,
//            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'protocol_number', $this->protocol_number])
//            ->andFilterWhere(['like', 'file', $this->file])
        ;

        return $dataProvider;
    }
}
