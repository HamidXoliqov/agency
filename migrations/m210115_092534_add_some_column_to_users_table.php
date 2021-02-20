<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department}}`
 */
class m210115_092534_add_some_column_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'department_id', $this->integer());

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-users-department_id}}',
            '{{%users}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-users-department_id}}',
            '{{%users}}',
            'department_id',
            '{{%department}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-users-department_id}}',
            '{{%users}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-users-department_id}}',
            '{{%users}}'
        );

        $this->dropColumn('{{%users}}', 'department_id');
    }
}
