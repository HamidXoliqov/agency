<?php

namespace app\modules\admin\models;

use app\modules\structure\models\Department;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Users;

/**
 * UsersSearch represents the model behind the search form of `app\modules\admin\models\Users`.
 */
class UsersSearch extends Users
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['fullname', 'username', 'password', 'email', 'address', 'in', 'out','card_number'], 'safe'],
        ];
    }

    /**
     * @return array|array[]
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
    public function search(): ActiveDataProvider
    {
        $params = \Yii::$app->request->post();
        $query = Users::find()->where(['!=', 'users.status', Users::STATUS_DELETED]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ],

            ],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith(['userDepartment']);
        // grid filtering conditions
        $query->andFilterWhere([
            'users.id' => $this->id,
            'users.status' => $this->status,
        ]);
        if (!empty($params['UsersSearch']['out'])) {
            $query->andFilterWhere(['and', ['in', 'user_department.department_id', $this->out], ['=', 'user_department.is_transfer', Department::IS_TRANSFER_OUTPUTING]]);
        }
        if (!empty($params['UsersSearch']['in'])) {
            $query->andFilterWhere(['and', ['in', 'user_department.department_id', $this->in], ['=', 'user_department.is_transfer', Department::IS_TRANSFER_RESIVING]]);
        }
        $query->andFilterWhere(['ilike', 'users.fullname', $this->fullname])
            ->andFilterWhere(['ilike', 'users.username', $this->username])
            ->andFilterWhere(['ilike', 'users.email', $this->email])
            ->andFilterWhere(['ilike', 'users.address', $this->address]);

        return $dataProvider;
    }
}
