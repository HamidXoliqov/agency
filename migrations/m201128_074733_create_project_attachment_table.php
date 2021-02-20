<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_attachment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project}}`
 * - `{{%attachment}}`
 */
class m201128_074733_create_project_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%attachment}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'size' => $this->integer(),
            'extension' => $this->string(),
            'path' => $this->string(255),
            'status' => $this->tinyInteger()->defaultValue(1),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->createIndex(
            '{{%idx-attachment-created_by}}',
            '{{%attachment}}',
            'created_by'
        );
        $this->addForeignKey(
            '{{%fk-attachment-created_by}}',
            '{{%attachment}}',
            'created_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            '{{%idx-attachment-updated_by}}',
            '{{%attachment}}',
            'updated_by'
        );
        $this->addForeignKey(
            '{{%fk-attachment-updated_by}}',
            '{{%attachment}}',
            'updated_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        $this->createTable('{{%project_attachment}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(),
            'attachment_id' => $this->integer(),
        ]);
        $this->createIndex(
            '{{%idx-project_attachment-project_id}}',
            '{{%project_attachment}}',
            'project_id'
        );
        $this->addForeignKey(
            '{{%fk-project_attachment-project_id}}',
            '{{%project_attachment}}',
            'project_id',
            '{{%project}}',
            'id',
            'CASCADE'
        );

        // creates index for column `attachment_id`
        $this->createIndex(
            '{{%idx-project_attachment-attachment_id}}',
            '{{%project_attachment}}',
            'attachment_id'
        );

        // add foreign key for table `{{%attachment}}`
        $this->addForeignKey(
            '{{%fk-project_attachment-attachment_id}}',
            '{{%project_attachment}}',
            'attachment_id',
            '{{%attachment}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-project_attachment-project_id}}',
            '{{%project_attachment}}'
        );
        $this->dropIndex(
            '{{%idx-project_attachment-project_id}}',
            '{{%project_attachment}}'
        );
        $this->dropForeignKey(
            '{{%fk-project_attachment-attachment_id}}',
            '{{%project_attachment}}'
        );
        $this->dropIndex(
            '{{%idx-project_attachment-attachment_id}}',
            '{{%project_attachment}}'
        );
        $this->dropTable('{{%project_attachment}}');

        $this->dropForeignKey(
            '{{%fk-attachment-updated_by}}',
            '{{%attachment}}'
        );
        $this->dropIndex(
            '{{%idx-attachment-updated_by}}',
            '{{%attachment}}'
        );
        $this->dropForeignKey(
            '{{%fk-attachment-created_by}}',
            '{{%attachment}}'
        );
        $this->dropIndex(
            '{{%idx-attachment-created_by}}',
            '{{%attachment}}'
        );
        $this->dropTable('{{%attachment}}');
    }
}
