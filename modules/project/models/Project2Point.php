<?php

namespace app\modules\project\models;

use app\modules\manuals\models\Contragent;
use Yii;

/**
 * This is the model class for table "project_2_point".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $project_id
 * @property int|null $contragent_id
 * @property int|null $order_number
 *
 * @property Contragent $contragent
 * @property Project $project
 */
class Project2Point extends \app\models\BaseModel
{

    public function behaviors(){
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_2_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'contragent_id', 'order_number'], 'default', 'value' => null],
            [['project_id', 'contragent_id', 'order_number'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['contragent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contragent::className(), 'targetAttribute' => ['contragent_id' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
            'project_id' => Yii::t('app', 'Project ID'),
            'contragent_id' => Yii::t('app', 'Contragent ID'),
            'order_number' => Yii::t('app', 'Order Number'),
        ];
    }

    /**
     * Gets query for [[Contragent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContragent()
    {
        return $this->hasOne(Contragent::className(), ['id' => 'contragent_id']);
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
