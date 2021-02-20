<?php

namespace app\modules\admin\models;

use yii\base\Model;
use app\models\BaseModel;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Employee;

/**
 * SearchEmployee represents the model behind the search form of `app\modules\admin\models\Employee`.
 */
class SearchEmployee extends Employee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tin', 'ns10Code', 'ns11Code', 'sex', 'passNumber', 'phone', 'zipCode', 'ns13Code', 'isitd', 'personalNum', 'docCode', 'isNotary', 'department_id'], 'integer'],
            [['ns10Name', 'ns11Name', 'fullName', 'birthDate', 'sexName', 'passSeries', 'passDate', 'passOrg', 'address', 'ns13Name', 'tinDate', 'dateModify', 'docName'], 'safe'],
            [['duty'], 'boolean'],
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
        $query = Employee::find();
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
            'tin' => $this->tin,
            'ns10Code' => $this->ns10Code,
            'ns11Code' => $this->ns11Code,
            'birthDate' => $this->birthDate,
            'sex' => $this->sex,
            'passNumber' => $this->passNumber,
            'passDate' => $this->passDate,
            'phone' => $this->phone,
            'zipCode' => $this->zipCode,
            'ns13Code' => $this->ns13Code,
            'tinDate' => $this->tinDate,
            'dateModify' => $this->dateModify,
            'isitd' => $this->isitd,
            'duty' => $this->duty,
            'personalNum' => $this->personalNum,
            'docCode' => $this->docCode,
            'isNotary' => $this->isNotary,
            'department_id' => $this->department_id,
        ]);

        $query->andFilterWhere(['ilike', 'ns10Name', $this->ns10Name])
            ->andFilterWhere(['ilike', 'ns11Name', $this->ns11Name])
            ->andFilterWhere(['ilike', 'fullName', $this->fullName])
            ->andFilterWhere(['ilike', 'sexName', $this->sexName])
            ->andFilterWhere(['ilike', 'passSeries', $this->passSeries])
            ->andFilterWhere(['ilike', 'passOrg', $this->passOrg])
            ->andFilterWhere(['ilike', 'address', $this->address])
            ->andFilterWhere(['ilike', 'ns13Name', $this->ns13Name])
            ->andFilterWhere(['ilike', 'docName', $this->docName]);

        return $dataProvider;
    }
}
