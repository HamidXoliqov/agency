<?php

namespace app\modules\warehouse\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\warehouse\models\Item;

/**
 * ItemSearch represents the model behind the search form of `app\modules\warehouse\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'unit_id', 'country_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name_en', 'name_ru', 'name_uz', 'short_name', 'article', 'add_info'], 'safe'],
            [['size', 'weight', 'stock_limit'], 'number'],
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
        $query = Item::find();

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
            'category_id' => $this->category_id,
            'size' => $this->size,
            'weight' => $this->weight,
            'unit_id' => $this->unit_id,
            'country_id' => $this->country_id,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'stock_limit' => $this->stock_limit,
        ]);

        $query->andFilterWhere(['ilike', 'name_en', $this->name_en])
            ->andFilterWhere(['ilike', 'name_ru', $this->name_ru])
            ->andFilterWhere(['ilike', 'name_uz', $this->name_uz])
            ->andFilterWhere(['ilike', 'short_name', $this->short_name])
            ->andFilterWhere(['ilike', 'article', $this->article])
            ->andFilterWhere(['ilike', 'add_info', $this->add_info]);

        return $dataProvider;
    }
}
