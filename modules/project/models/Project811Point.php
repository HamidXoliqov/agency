<?php

namespace app\modules\project\models;

use Yii;

/**
 * This is the model class for table "project_8_11_point".
 *
 * @property int $id
 * @property float|null $own_funds 8
 * @property float|null $fdi foreign direct investment - 9
 * @property float|null $fund_resources 10
 * @property float|null $bank_loans 11
 * @property int|null $project_id
 * @property int|null $order_number
 *
 * @property Project $project
 */
class Project811Point extends \app\models\BaseModel
{
    public function behaviors(){
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_8_11_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['own_funds', 'fdi', 'fund_resources', 'bank_loans'], 'number'],
            [['project_id', 'order_number'], 'default', 'value' => null],
            [['project_id', 'order_number'], 'integer'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'own_funds' => Yii::t('app', 'Own Funds'),
            'fdi' => Yii::t('app', 'Fdi'),
            'fund_resources' => Yii::t('app', 'Fund Resources'),
            'bank_loans' => Yii::t('app', 'Bank Loans'),
            'project_id' => Yii::t('app', 'Project ID'),
            'order_number' => Yii::t('app', 'Order Number'),
        ];
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
