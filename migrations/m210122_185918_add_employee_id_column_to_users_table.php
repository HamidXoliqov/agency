<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 */
class m210122_185918_add_employee_id_column_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'employee_id', $this->integer());

        // creates index for column `employee_id`
        $this->createIndex(
            '{{%idx-users-employee_id}}',
            '{{%users}}',
            'employee_id'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-users-employee_id}}',
            '{{%users}}',
            'employee_id',
            '{{%employee}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%employee}}`
        $this->dropForeignKey(
            '{{%fk-users-employee_id}}',
            '{{%users}}'
        );

        // drops index for column `employee_id`
        $this->dropIndex(
            '{{%idx-users-employee_id}}',
            '{{%users}}'
        );

        $this->dropColumn('{{%users}}', 'employee_id');
    }
}
