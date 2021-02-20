<?php

namespace app\modules\subsidy\models;

use app\modules\manuals\models\AppealStatus;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\subsidy\models\Appeal;
use yii\helpers\ArrayHelper;

/**
 * AppealSearch represents the model behind the search form of `app\modules\subsidy\models\Appeal`.
 */
class AppealSearch extends Appeal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'contragent_id', 'appeal_status', 'appeal_type', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
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
        $query = Appeal::find();

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
            'contragent_id' => $this->contragent_id,
            'appeal_status' => $this->appeal_status,
            'appeal_type' => $this->appeal_type,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchForAgency($params = [])
    {
        $pagination = [
            'pageSize' => 10,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ];
        $pagination = ArrayHelper::merge($pagination, $params);
        $query = Appeal::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => $pagination,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC
//                    'title' => SORT_ASC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
//        $query->andFilterWhere(['>', 'appeal_status', AppealStatus::APPEAL_NEW]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'contragent_id' => $this->contragent_id,
            'appeal_status' => $this->appeal_status,
            'appeal_type' => $this->appeal_type,
            'status' => $this->status,
//            'created_at' => $this->created_at,
//            'created_by' => $this->created_by,
//            'updated_at' => $this->updated_at,
//            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
