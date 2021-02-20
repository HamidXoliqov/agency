<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_models}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item}}`
 * - `{{%item_references}}`
 * - `{{%item_references}}`
 */
class m200916_093849_create_item_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item_models}}', [
            'id' => $this->primaryKey(),
            'value' => $this->string(),
            'item_id' => $this->integer(),
            'item_references_id' => $this->integer(),
            'item_references_parent_id' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `item_id`
        $this->createIndex(
            '{{%idx-item_models-item_id}}',
            '{{%item_models}}',
            'item_id'
        );

        // add foreign key for table `{{%item}}`
        $this->addForeignKey(
            '{{%fk-item_models-item_id}}',
            '{{%item_models}}',
            'item_id',
            '{{%item}}',
            'id',
            'CASCADE'
        );

        // creates index for column `item_references_id`
        $this->createIndex(
            '{{%idx-item_models-item_references_id}}',
            '{{%item_models}}',
            'item_references_id'
        );

        // add foreign key for table `{{%item_references}}`
        $this->addForeignKey(
            '{{%fk-item_models-item_references_id}}',
            '{{%item_models}}',
            'item_references_id',
            '{{%item_references}}',
            'id',
            'CASCADE'
        );

        // creates index for column `item_references_parent_id`
        $this->createIndex(
            '{{%idx-item_models-item_references_parent_id}}',
            '{{%item_models}}',
            'item_references_parent_id'
        );

        // add foreign key for table `{{%item_references}}`
        $this->addForeignKey(
            '{{%fk-item_models-item_references_parent_id}}',
            '{{%item_models}}',
            'item_references_parent_id',
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
        // drops foreign key for table `{{%item}}`
        $this->dropForeignKey(
            '{{%fk-item_models-item_id}}',
            '{{%item_models}}'
        );

        // drops index for column `item_id`
        $this->dropIndex(
            '{{%idx-item_models-item_id}}',
            '{{%item_models}}'
        );

        // drops foreign key for table `{{%item_references}}`
        $this->dropForeignKey(
            '{{%fk-item_models-item_references_id}}',
            '{{%item_models}}'
        );

        // drops index for column `item_references_id`
        $this->dropIndex(
            '{{%idx-item_models-item_references_id}}',
            '{{%item_models}}'
        );

        // drops foreign key for table `{{%item_references}}`
        $this->dropForeignKey(
            '{{%fk-item_models-item_references_parent_id}}',
            '{{%item_models}}'
        );

        // drops index for column `item_references_parent_id`
        $this->dropIndex(
            '{{%idx-item_models-item_references_parent_id}}',
            '{{%item_models}}'
        );

        $this->dropTable('{{%item_models}}');
    }
}
