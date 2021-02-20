<?php

namespace app\modules\warehouse\models;

use Yii;

/**
 * This is the model class for table "license".
 *
 * @property int $id
 * @property string|null $serial_number
 * @property string|null $serial
 * @property string|null $order_number
 * @property int|null $item_category_id
 * @property string|null $order_date
 * @property string|null $given_date
 * @property string|null $expiration_date
 * @property string|null $responsible
 * @property int|null $department_id
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Department $department
 * @property ItemCategory $itemCategory
 */
class License extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'license';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_category_id', 'department_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['item_category_id', 'department_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['order_date', 'given_date', 'expiration_date'], 'safe'],
            [['serial_number', 'serial', 'order_number', 'responsible'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['item_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::className(), 'targetAttribute' => ['item_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app-msg', 'ID'),
            'serial_number' => Yii::t('app-msg', 'Serial Number'),
            'serial' => Yii::t('app-msg', 'Serial'),
            'order_number' => Yii::t('app-msg', 'Order Number'),
            'item_category_id' => Yii::t('app-msg', 'Item Category ID'),
            'order_date' => Yii::t('app-msg', 'Order Date'),
            'given_date' => Yii::t('app-msg', 'Given Date'),
            'expiration_date' => Yii::t('app-msg', 'Expiration Date'),
            'responsible' => Yii::t('app-msg', 'Responsible'),
            'department_id' => Yii::t('app-msg', 'Department ID'),
            'status' => Yii::t('app-msg', 'Status'),
            'created_by' => Yii::t('app-msg', 'Created By'),
            'updated_by' => Yii::t('app-msg', 'Updated By'),
            'created_at' => Yii::t('app-msg', 'Created At'),
            'updated_at' => Yii::t('app-msg', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[ItemCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemCategory()
    {
        return $this->hasOne(ItemCategory::className(), ['id' => 'item_category_id']);
    }
}
