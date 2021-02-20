<?php

namespace app\modules\manuals\models;

use yii\base\Model;
use yii\data\SqlDataProvider;

/**
 * CountriesSearch represents the model behind the search form of `app\modules\warehouse\models\Countries`.
 */
class CountriesSearch extends Countries
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['code', 'name_en', 'name_ru', 'name_uz'], 'safe'],
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
     * @return SqlDataProvider
     * @throws \yii\db\Exception
     */
    public function search($params)
    {
        $params = \Yii::$app->request->post();

        $this->load($params);

        $where = "";
        if (!empty($this->status)){
            $where.= sprintf(" AND status = %d ", $this->status);
        }
        if (!empty($this->code)){
            $where.= sprintf(" AND code ILIKE '%%%s%%' ", $this->code);
        }
        if (!empty($this->name_en)){
            $where.= sprintf(" AND name_en ILIKE '%%%s%%' ", $this->name_en);
        }
        if (!empty($this->name_ru)){
            $where.= sprintf(" AND name_ru ILIKE '%%%s%%' ", $this->name_ru);
        }
        if (!empty($this->name_uz)){
            $where.= sprintf(" AND name_uz ILIKE '%%%s%%' ", $this->name_uz);
        }

        $sql = sprintf("SELECT * FROM countries WHERE status != %d %s", self::STATUS_DELETED, $where);
        $count = \Yii::$app->db->createCommand(
            str_replace("SELECT * FROM", "SELECT COUNT(*) FROM", $sql))->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' =>$count,
            'sort' => [
                'defaultOrder'=>[
                    'id' =>SORT_ASC
                ],
                'attributes' => [
                    'id' =>[
                        'asc' => ['id' => SORT_ASC],
                        'desc' => ['id' => SORT_DESC],
                        'default' => SORT_ASC,
                    ],
                    'name_uz' => [
                        'asc' => ['name_uz' => SORT_ASC],
                        'desc' => ['name_uz' => SORT_DESC],
                        'default' => SORT_ASC,
                    ],
                    'name_ru' => [
                        'asc' => ['name_ru' => SORT_ASC],
                        'desc' => ['name_ru' => SORT_DESC],
                        'default' => SORT_ASC,
                    ],
                    'name_en' => [
                        'asc' => ['name_en' => SORT_ASC],
                        'desc' => ['name_en' => SORT_DESC],
                        'default' => SORT_ASC,
                    ],
                    'code' => [
                        'asc' => ['code' => SORT_ASC],
                        'desc' => ['code' => SORT_DESC],
                        'default' => SORT_ASC,
                    ],
                ],
            ],
            'pagination' => [
                'pageSize' => 40,
            ],
        ]);

        return $dataProvider;
    }
}
