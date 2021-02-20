<?php

namespace app\modules\project\models;

use app\models\Attachment;
use app\models\BaseModel;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "project_attachment".
 *
 * @property int $id
 * @property int|null $project_id
 * @property int|null $attachment_id
 *
 * @property Attachment $attachment
 * @property Project $project
 */
class ProjectAttachment extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_attachment';
    }

    /**
     * @return array|array[]
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'attachment_id'], 'default', 'value' => null],
            [['project_id', 'attachment_id'], 'integer'],
            [['attachment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::class, 'targetAttribute' => ['attachment_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'attachment_id' => Yii::t('app', 'Attachment ID'),
        ];
    }

    /**
     * Gets query for [[Attachment]].
     *
     * @return ActiveQuery
     */
    public function getAttachment()
    {
        return $this->hasOne(Attachment::class, ['id' => 'attachment_id']);
    }

    /**
     * Gets query for [[Project]].
     *
     * @return ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }
}
