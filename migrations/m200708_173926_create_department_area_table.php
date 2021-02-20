<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%department_area}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department}}`
 * - `{{%department_area}}`
 */
class m200708_173926_create_department_area_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%department_area}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->string()->unique(),
            'department_id' => $this->integer(),
            'parent_id' => $this->integer(),
            'add_info' => $this->string(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-department_area-department_id}}',
            '{{%department_area}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-department_area-department_id}}',
            '{{%department_area}}',
            'department_id',
            '{{%department}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-department_area-parent_id}}',
            '{{%department_area}}',
            'parent_id'
        );

        // add foreign key for table `{{%department_area}}`
        $this->addForeignKey(
            '{{%fk-department_area-parent_id}}',
            '{{%department_area}}',
            'parent_id',
            '{{%department_area}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-department_area-department_id}}',
            '{{%department_area}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-department_area-department_id}}',
            '{{%department_area}}'
        );

        // drops foreign key for table `{{%department_area}}`
        $this->dropForeignKey(
            '{{%fk-department_area-parent_id}}',
            '{{%department_area}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-department_area-parent_id}}',
            '{{%department_area}}'
        );

        $this->dropTable('{{%department_area}}');
    }
}
