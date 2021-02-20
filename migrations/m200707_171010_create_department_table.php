<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%department}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department}}`
 * - `{{%directory}}`
 * - `{{%directory}}`
 */
class m200707_171010_create_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%department}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'name_uz' => $this->string(),
            'name_ru' => $this->string(),
            'name_en' => $this->string(),
            'short_name' => $this->string(50),
            'currency_id' => $this->integer(),
            'department_type_id' => $this->integer(),
            'inn' => $this->string(25),
            'okonx' => $this->string(25),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-department-parent_id}}',
            '{{%department}}',
            'parent_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-department-parent_id}}',
            '{{%department}}',
            'parent_id',
            '{{%department}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `currency_id`
        $this->createIndex(
            '{{%idx-department-currency_id}}',
            '{{%department}}',
            'currency_id'
        );

        // add foreign key for table `{{%directory}}`
        $this->addForeignKey(
            '{{%fk-department-currency_id}}',
            '{{%department}}',
            'currency_id',
            '{{%references}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `department_type_id`
        $this->createIndex(
            '{{%idx-department-department_type_id}}',
            '{{%department}}',
            'department_type_id'
        );

        // add foreign key for table `{{%directory}}`
        $this->addForeignKey(
            '{{%fk-department-department_type_id}}',
            '{{%department}}',
            'department_type_id',
            '{{%references}}',
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
            '{{%fk-department-parent_id}}',
            '{{%department}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-department-parent_id}}',
            '{{%department}}'
        );

        // drops foreign key for table `{{%directory}}`
        $this->dropForeignKey(
            '{{%fk-department-currency_id}}',
            '{{%department}}'
        );

        // drops index for column `currency_id`
        $this->dropIndex(
            '{{%idx-department-currency_id}}',
            '{{%department}}'
        );

        // drops foreign key for table `{{%directory}}`
        $this->dropForeignKey(
            '{{%fk-department-department_type_id}}',
            '{{%department}}'
        );

        // drops index for column `department_type_id`
        $this->dropIndex(
            '{{%idx-department-department_type_id}}',
            '{{%department}}'
        );

        $this->dropTable('{{%department}}');
    }
}
