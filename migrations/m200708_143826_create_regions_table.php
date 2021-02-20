<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%regions}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%regions}}`
 */
class m200708_143826_create_regions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%regions}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(100),
            'name_ru' => $this->string(100),
            'name_en' => $this->string(100),
            'parent_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-regions-parent_id}}',
            '{{%regions}}',
            'parent_id'
        );

        // add foreign key for table `{{%regions}}`
        $this->addForeignKey(
            '{{%fk-regions-parent_id}}',
            '{{%regions}}',
            'parent_id',
            '{{%regions}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%regions}}`
        $this->dropForeignKey(
            '{{%fk-regions-parent_id}}',
            '{{%regions}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-regions-parent_id}}',
            '{{%regions}}'
        );

        $this->dropTable('{{%regions}}');
    }
}
