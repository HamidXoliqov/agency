<?php

namespace app\modules\manuals\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ReferencesTypeSearch represents the model behind the search form of `app\modules\structure\models\ReferencesType`.
 */
class ReferencesTypeSearch extends ReferencesType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name_uz', 'name_ru', 'name_en'], 'safe'],
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
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ReferencesType::find()->where(['not in','status',self::STATUS_DELETED]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>[
                'defaultOrder'=>[
                    'id'=>SORT_ASC
                ]
            ]
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

        $query->andFilterWhere(['ilike', 'name_uz', $this->name_uz])
            ->andFilterWhere(['ilike', 'name_ru', $this->name_ru])
            ->andFilterWhere(['ilike', 'name_en', $this->name_en]);

        return $dataProvider;
    }
}
