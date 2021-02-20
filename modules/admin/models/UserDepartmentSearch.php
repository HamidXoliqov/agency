<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserDepartmentSearch represents the model behind the search form of `app\modules\admin\models\UserDepartment`.
 */
class UserDepartmentSearch extends UserDepartment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'created_by', 'updated_by','is_transfer'], 'integer'],
            [['user_id', 'department_id'],'safe'],
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
     * @return ActiveDataProvider
     */
    public function search()
    {
        $params = \Yii::$app->request->post();
        $query = UserDepartment::find()
            ->select(['user_id as user_id' ,'array_agg(department_id) as department_id','array_agg(is_transfer) as is_transfer'])
            ->groupBy(['user_id']);
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
        $query ->joinWith(['user']);
        $query ->joinWith(['department']);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'is_transfer' => $this->is_transfer,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);
        $query ->andFilterWhere(['like','users.fullname',$this->user_id])
               ->andFilterWhere(['like','department.'.'name_'.\Yii::$app->language.'',$this->department_id]);
        return $dataProvider;
    }
}
