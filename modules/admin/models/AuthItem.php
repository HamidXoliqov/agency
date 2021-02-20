<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property int $type
 * @property string|null $description
 * @property string|null $rule_name
 * @property resource|null $data
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthItemChild[] $authItemChildren
 * @property AuthItemChild[] $authItemChildren0
 * @property AuthItem[] $children
 * @property AuthItem[] $parents
 */
class AuthItem extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'rule_name' => Yii::t('app', 'Rule Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getAuthItemChildren()
    {
        return $this->hasMany(AuthItemChild::className(), ['parent' => 'name']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getAuthItemChildren0()
    {
        return $this->hasMany(AuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'child'])->viaTable('auth_item_child', ['parent' => 'name']);
    }

    /**
     * @return yii\db\ActiveQuery
     * @throws yii\base\InvalidConfigException
     */
    public function getParents()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'parent'])->viaTable('auth_item_child', ['child' => 'name']);
    }

    public static function getAuthItemUniversal($all_children = null){
        $result = '';
        $i = 0;
        $asosiy = AuthItem::find()->where(['type' => '3'])->all();
        foreach ($asosiy as $item) {
            $sql = sprintf("SELECT * FROM auth_item WHERE auth_item.name LIKE '%s/%%' AND type = '2'", $item['name']);
            $childs = Yii::$app->db->createCommand($sql)->queryAll();
            $result .= '<div class="col-sm-12 col-md-4">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-body">
                        <div class="form-group">
                         <div class="text-center">
                            <label class="checked-true-false" style="color: #0a6aa1!important;">
                            <i class="la la-arrow-circle-down text-info"></i>
                            ' . $item['name'] . '
                            </label>
                         </div>
                         <hr>
                            <div class="checkbox-list">';
                                foreach ($childs as $child) {
                                    $checked = '';
                                    if (array_search($child['name'], $all_children) > 0){
                                        $checked = 'checked';
                                    }
                                    $result .= '<label class="checkbox">
                                        <input type="checkbox" name="AuthItem[]'.$i++.'" value="'.$child['name'].'" '.$checked.'/> 
                                        '.$child['name'].'
                                        <span></span>
                                    </label>';
                                }
            $result .= '     </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        return $result;
    }

}
