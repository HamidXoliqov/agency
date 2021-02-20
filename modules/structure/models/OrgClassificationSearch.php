<?php

namespace app\modules\structure\models;

use yii\base\Model;
use app\models\BaseModel;
use yii\data\ActiveDataProvider;
use app\modules\structure\models\OrgClassification;

/**
 * OrgClassificationSearch represents the model behind the search form of `app\modules\structure\models\OrgClassification`.
 */
class OrgClassificationSearch extends OrgClassification
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_id'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'stat_code', 'tax_code'], 'safe'],
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
        $query = OrgClassification::find();
        $query->where(['status' => BaseModel::STATUS_ACTIVE]);

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
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['ilike', 'name_uz', $this->name_uz])
            ->andFilterWhere(['ilike', 'name_ru', $this->name_ru])
            ->andFilterWhere(['ilike', 'name_en', $this->name_en])
            ->andFilterWhere(['ilike', 'stat_code', $this->stat_code])
            ->andFilterWhere(['ilike', 'tax_code', $this->tax_code]);

        return $dataProvider;
    }
}
