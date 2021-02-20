<?php

namespace app\modules\manuals\models;

use app\modules\warehouse\models\ItemModels;
use Yii;

/**
 * This is the model class for table "item_references".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $token
 * @property int|null $sort
 * @property int|null $parent_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property ItemModes[] $itemModes
 * @property ItemModes[] $itemModes0
 * @property ItemReferences $parent
 * @property ItemReferences[] $itemReferences
 */
class ItemReferences extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_references';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'parent_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['sort', 'parent_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['sort','name_uz', 'name_ru', 'name_en', 'token' ], 'required'],
            [['name_uz', 'name_ru', 'name_en', 'token'], 'string', 'max' => 255],
            [['token'],'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemReferences::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'token' => Yii::t('app', 'Code'),
            'sort' => Yii::t('app', 'Sort'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[ItemModes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemModels()
    {
        return $this->hasMany(ItemModels::className(), ['item_references_id' => 'id']);
    }

    /**
     * Gets query for [[ItemModes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemReferences()
    {
        return $this->hasMany(ItemReferences::className(), ['item_references_parent_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ItemReferences::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[ItemReferences]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemReferencesParent()
    {
        return $this->hasMany(ItemReferences::className(), ['parent_id' => 'id']);
    }
    public function getParentItem($id){
        $sql = "SELECT * FROM item_references WHERE parent_id = %d";
        return Yii::$app->db->createCommand(sprintf($sql,$id))->queryAll();
    }
}
