<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_references}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item_references}}`
 */
class m200916_093311_create_item_references_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item_references}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(),
            'name_ru' => $this->string(),
            'name_en' => $this->string(),
            'token' => $this->string(),
            'sort' => $this->integer(),
            'parent_id' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-item_references-parent_id}}',
            '{{%item_references}}',
            'parent_id'
        );

        // add foreign key for table `{{%item_references}}`
        $this->addForeignKey(
            '{{%fk-item_references-parent_id}}',
            '{{%item_references}}',
            'parent_id',
            '{{%item_references}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%item_references}}`
        $this->dropForeignKey(
            '{{%fk-item_references-parent_id}}',
            '{{%item_references}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-item_references-parent_id}}',
            '{{%item_references}}'
        );

        $this->dropTable('{{%item_references}}');
    }
}
