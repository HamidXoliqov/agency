<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item_category}}`
 * - `{{%references}}`
 * - `{{%countries}}`
 */
class m200708_123643_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(),
            'name_en' => $this->string(),
            'name_ru' => $this->string(),
            'name_uz' => $this->string(),
            'short_name' => $this->string(50),
            'category_id' => $this->integer(),
            'size' => $this->decimal(20,3),
            'weight' => $this->decimal(20,3),
            'unit_id' => $this->integer(),
            'article' => $this->string(),
            'country_id' => $this->integer(),
            'add_info' => $this->string(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-item-category_id}}',
            '{{%item}}',
            'category_id'
        );

        // add foreign key for table `{{%item_category}}`
        $this->addForeignKey(
            '{{%fk-item-category_id}}',
            '{{%item}}',
            'category_id',
            '{{%item_category}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `unit_id`
        $this->createIndex(
            '{{%idx-item-unit_id}}',
            '{{%item}}',
            'unit_id'
        );

        // add foreign key for table `{{%references}}`
        $this->addForeignKey(
            '{{%fk-item-unit_id}}',
            '{{%item}}',
            'unit_id',
            '{{%references}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-item-country_id}}',
            '{{%item}}',
            'country_id'
        );

        // add foreign key for table `{{%countries}}`
        $this->addForeignKey(
            '{{%fk-item-country_id}}',
            '{{%item}}',
            'country_id',
            '{{%countries}}',
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
            '{{%fk-item-category_id}}',
            '{{%item}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-item-category_id}}',
            '{{%item}}'
        );

        // drops foreign key for table `{{%references}}`
        $this->dropForeignKey(
            '{{%fk-item-unit_id}}',
            '{{%item}}'
        );

        // drops index for column `unit_id`
        $this->dropIndex(
            '{{%idx-item-unit_id}}',
            '{{%item}}'
        );

        // drops foreign key for table `{{%countries}}`
        $this->dropForeignKey(
            '{{%fk-item-country_id}}',
            '{{%item}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-item-country_id}}',
            '{{%item}}'
        );

        $this->dropTable('{{%item}}');
    }
}
