<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item_category}}`
 */
class m200708_123451_create_item_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item_category}}', [
            'id' => $this->primaryKey(),
            'name_en' => $this->string(),
            'name_ru' => $this->string(),
            'name_uz' => $this->string(),
            'parent_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-item_category-parent_id}}',
            '{{%item_category}}',
            'parent_id'
        );

        // add foreign key for table `{{%item_category}}`
        $this->addForeignKey(
            '{{%fk-item_category-parent_id}}',
            '{{%item_category}}',
            'parent_id',
            '{{%item_category}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%item_category}}`
        $this->dropForeignKey(
            '{{%fk-item_category-parent_id}}',
            '{{%item_category}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-item_category-parent_id}}',
            '{{%item_category}}'
        );

        $this->dropTable('{{%item_category}}');
    }
}
