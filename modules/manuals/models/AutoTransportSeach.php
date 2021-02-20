<?php

namespace app\modules\manuals\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\manuals\models\AutoTransport;

/**
 * AutoTransportSeach represents the model behind the search form of `app\modules\manuals\models\AutoTransport`.
 */
class AutoTransportSeach extends AutoTransport
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'type', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'car_number', 'car_tel'], 'safe'],
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
        $query = AutoTransport::find();

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
            'type' => $this->type,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'name_uz', $this->name_uz])
            ->andFilterWhere(['ilike', 'name_ru', $this->name_ru])
            ->andFilterWhere(['ilike', 'name_en', $this->name_en])
            ->andFilterWhere(['ilike', 'car_number', $this->car_number])
            ->andFilterWhere(['ilike', 'car_tel', $this->car_tel]);

        return $dataProvider;
    }
}
