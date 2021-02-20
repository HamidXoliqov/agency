<?php

namespace app\modules\manuals\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\manuals\models\Contragent;

/**
 * ContragentSearch represents the model behind the search form of `app\modules\manuals\models\Contragent`.
 */
class ContragentSearch extends Contragent
{
    /**
     * @return array|array[]
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'short_name', 'add_info', 'address', 'director', 'tel', 'inn', 'vatcode', 'oked', 'accounter'], 'safe'],
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
        $query = Contragent::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'short_name', $this->short_name])
            ->andFilterWhere(['ilike', 'add_info', $this->add_info])
            ->andFilterWhere(['ilike', 'address', $this->address])
            ->andFilterWhere(['ilike', 'director', $this->director])
            ->andFilterWhere(['ilike', 'tel', $this->tel])
            ->andFilterWhere(['ilike', 'inn', $this->inn])
            ->andFilterWhere(['ilike', 'vatcode', $this->vatcode])
            ->andFilterWhere(['ilike', 'oked', $this->oked])
            ->andFilterWhere(['ilike', 'accounter', $this->accounter]);

        return $dataProvider;
    }
}
