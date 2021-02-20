<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%department}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department_type}}`
 */
class m210122_133320_add_column_to_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%department}}', 'department_type_id', $this->integer());

        // creates index for column `department_type_id`
        $this->createIndex(
            '{{%idx-department-department_type_id}}',
            '{{%department}}',
            'department_type_id'
        );

        // add foreign key for table `{{%department_type}}`
        $this->addForeignKey(
            '{{%fk-department-department_type_id}}',
            '{{%department}}',
            'department_type_id',
            '{{%references}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%department_type}}`
        $this->dropForeignKey(
            '{{%fk-department-department_type_id}}',
            '{{%department}}'
        );

        // drops index for column `department_type_id`
        $this->dropIndex(
            '{{%idx-department-department_type_id}}',
            '{{%department}}'
        );

        $this->dropColumn('{{%department}}', 'department_type_id');
    }
}
