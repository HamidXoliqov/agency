<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%employee}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department}}`
 */
class m210122_190256_add_department_id_column_to_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%employee}}', 'department_id', $this->integer());

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-employee-department_id}}',
            '{{%employee}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-employee-department_id}}',
            '{{%employee}}',
            'department_id',
            '{{%department}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-employee-department_id}}',
            '{{%employee}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-employee-department_id}}',
            '{{%employee}}'
        );

        $this->dropColumn('{{%employee}}', 'department_id');
    }
}
