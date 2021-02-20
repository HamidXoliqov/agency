<?php

namespace app\modules\manuals\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property int|null $parent_id
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Regions $parent
 * @property Regions[] $regions
 */
class Regions extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['parent_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 100],
            [['name_uz', 'name_ru', 'name_en'], 'required'],
            [['parent_id','status'],'safe'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
//            'parent_id' => Yii::t('app', 'Parent ID'),
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
    public function getParent()
    {
        return $this->hasOne(Regions::className(), ['id' => 'parent_id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getRegions()
    {
        return $this->hasMany(Regions::className(), ['parent_id' => 'id']);
    }

    /**
     * @param null $parent_id
     * @return string
     */
    public static function getRegionTreeViewHtmlForm($parent_id = null)
    {
        $regions = Regions::find()->where(['parent_id' => $parent_id])->andWhere(['!=','status', self::STATUS_DELETED])->all();//->andWhere(['status'=> self::STATUS_ACTIVE])
        $regions_tree = "";
        foreach ($regions as $region)
        {
            $regions_tree .= "<ul><li value='{$region['id']}' data-parent-id='{$region['parent_id']}' data-status='{$region['status']}' data-jstree='{\"opened\" : true}'>{$region['name_'.Yii::$app->language]}" . self::getRegionTreeViewHtmlForm($region['id']) . "</li></ul>";
        }
        return $regions_tree;
    }

    public static function getById($id)
    {
        return self::find()->where(['id' => $id])->asArray()->limit(1)->one();
    }

}
