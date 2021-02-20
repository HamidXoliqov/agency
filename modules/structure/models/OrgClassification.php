<?php

namespace app\modules\structure\models;

use Yii;

/**
 * This is the model class for table "org_classification".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $stat_code
 * @property string|null $tax_code
 *
 * @property OrgClassification $parent
 * @property OrgClassification[] $orgClassifications
 */
class OrgClassification extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org_classification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'default', 'value' => null],
            [['parent_id'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'stat_code', 'tax_code'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgClassification::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'stat_code' => Yii::t('app', 'Stat Code'),
            'tax_code' => Yii::t('app', 'Tax Code'),
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(OrgClassification::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[OrgClassifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgClassifications()
    {
        return $this->hasMany(OrgClassification::className(), ['parent_id' => 'id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getContragents()
    {
        return $this->hasMany(ContragentOrgClassification::className(), ['org_classification_id' => 'id']);
    }

    /**
     * @param null $parent_id
     * @return string
     */
    public static function getTreeViewHtmlForm($parent_id = null){
        $items = OrgClassification::find()->where(['parent_id' => $parent_id])->andWhere(['!=', 'status', self::STATUS_DELETED])->asArray()->all();
        $tree = "";
        $bol = 1;
        foreach ($items as $item){
            if ($parent_id == null && $bol == 1) {
                $bol = 0;
                $tree = $tree . "<ul><li value='{$item['id']}'  data-jstree='{ \"opened\" : true, \"selected\" : true }'>{$item['name_'.Yii::$app->language]}" . self::getTreeViewHtmlForm($item['id']) . "</li></ul>";
            } else {
                $tree = $tree . "<ul><li value='{$item['id']}'  data-jstree='{ \"opened\" : true }'>{$item['name_'.Yii::$app->language]}" . self::getTreeViewHtmlForm($item['id']) . "</li></ul>";
            }
        }
        return $tree;
    }

    /**
     * @param null $parent_id
     * @return string
     */
    public static function getTreeViewHtmlFormId($parent_id = null, $id = null){
        $items = OrgClassification::find()->where(['parent_id' => $parent_id]);
        // echo "<pre>";print_r($parent_id);die;
        if ($parent_id == null) {
            $items->andWhere(['id' => $id]);
        }

        $departments = $items->andWhere(['!=', 'status', self::STATUS_DELETED])->asArray()->all();
        $tree = "";
        $bol = 1;
        foreach ($departments as $item){
            if ($parent_id == null && $bol == 1) {
                $bol = 0;
                $tree = $tree . "<ul><li value='{$item['id']}'  data-jstree='{ \"opened\" : true, \"selected\" : true }'>{$item['name_uz']}" . self::getTreeViewHtmlForm($item['id']) . "</li></ul>";
            } else {
                $tree = $tree . "<ul><li value='{$item['id']}'  data-jstree='{ \"opened\" : true }'>{$item['name_uz']}" . self::getTreeViewHtmlForm($item['id']) . "</li></ul>";
            }
        }
        return $tree;
    }
}
