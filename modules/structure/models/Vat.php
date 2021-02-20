<?php

namespace app\modules\structure\models;

use Yii;

/**
 * This is the model class for table "vat".
 *
 * @property int $id
 * @property float|null $vat
 * @property int|null $department_id
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Department $department
 */
class Vat extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vat'], 'number'],
            [['department_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['department_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vat' => Yii::t('app', 'Vat'),
            'department_id' => Yii::t('app', 'Department'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    public static function getVatItems($id)
    {
        $items = Vat::find()->where(['department_id' => $id])->asArray()->all();
        $data = [];
        foreach ($items as $item){
            $item['created'] = date('d-m-Y', $item['created_at']);
            $item['updated'] = date('d-m-Y', $item['updated_at']);
            array_push($data ,$item);
        }
        return $data;
    }
}
