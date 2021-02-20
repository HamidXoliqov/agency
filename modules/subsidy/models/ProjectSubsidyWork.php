<?php

namespace app\modules\subsidy\models;

use app\models\BaseModel;
use Yii;

/**
 * This is the model class for table "project_subsidy_sub_work".
 *
 * @property int $id
 * @property int $project_subsidy_id
 * @property string|null $work_name
 * @property float|null $price
 * @property float|null $self_finance_sum
 * @property float|null $subsidy_sum
 * @property float|null $credit_sum
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property ProjectSubsidy $projectSubsidy
 */
class ProjectSubsidyWork extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_subsidy_sub_work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_subsidy_id'], 'required'],
            [['project_subsidy_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['project_subsidy_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['price', 'self_finance_sum', 'subsidy_sum', 'credit_sum'], 'number'],
            [['work_name'], 'string', 'max' => 300],
            [['project_subsidy_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectSubsidy::className(), 'targetAttribute' => ['project_subsidy_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_subsidy_id' => Yii::t('app', 'Project Subsidy ID'),
            'work_name' => Yii::t('app', 'Work Name'),
            'price' => Yii::t('app', 'Price'),
            'self_finance_sum' => Yii::t('app', 'Self Finance Sum'),
            'subsidy_sum' => Yii::t('app', 'Subsidy Sum'),
            'credit_sum' => Yii::t('app', 'Credit Sum'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[ProjectSubsidy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSubsidy()
    {
        return $this->hasOne(ProjectSubsidy::className(), ['id' => 'project_subsidy_id']);
    }


    public function getPriceAsMillionSum() {
        $price = $this->price;
        $price = $price * 0.000001;
        return sprintf("%0.2f", $price);
    }

    public function getSelfFinanceSumAsMillionSum() {
        $price = $this->self_finance_sum;
        $price = $price * 0.000001;
        return sprintf("%0.2f", $price);
    }

    public function getSubsidySumAsMillionSum() {
        $price = $this->subsidy_sum;
        $price = $price * 0.000001;
        return sprintf("%0.2f", $price);
    }

    public function getCreditSumAsMillionSum() {
        $price = $this->credit_sum;
        $price = $price * 0.000001;
        return sprintf("%0.2f", $price);
    }
}
