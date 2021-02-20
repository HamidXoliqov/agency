<?php

namespace app\modules\manuals\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LicenseSearch represents the model behind the search form of `app\modules\manuals\models\License`.
 */
class LicenseSearch extends License
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'department_id', 'item_category_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['serial_number', 'serial', 'order_number', 'order_date', 'given_date', 'expiration_date', 'responsible'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search()
    {
        $params = \Yii::$app->request->post();
        $query = License::find()->where(['not in','status',self::STATUS_DELETED]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>[
                'defaultOrder'=>[
                    'id'=>SORT_DESC
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
            'department_id' => $this->department_id,
            'item_category_id' => $this->item_category_id,
            'order_date' => $this->order_date,
            'given_date' => $this->given_date,
            'expiration_date' => $this->expiration_date,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'serial_number', $this->serial_number])
            ->andFilterWhere(['ilike', 'serial', $this->serial])
            ->andFilterWhere(['ilike', 'order_number', $this->order_number])
            ->andFilterWhere(['ilike', 'responsible', $this->responsible]);

        return $dataProvider;
    }
}
