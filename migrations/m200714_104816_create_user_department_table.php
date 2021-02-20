<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_department}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%department}}`
 */
class m200714_104816_create_user_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_department}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'department_id' => $this->integer(),
            'is_transfer' => $this->smallInteger(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_department-user_id}}',
            '{{%user_department}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-user_department-user_id}}',
            '{{%user_department}}',
            'user_id',
            '{{%users}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-user_department-department_id}}',
            '{{%user_department}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-user_department-department_id}}',
            '{{%user_department}}',
            'department_id',
            '{{%department}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-user_department-user_id}}',
            '{{%user_department}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_department-user_id}}',
            '{{%user_department}}'
        );

        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-user_department-department_id}}',
            '{{%user_department}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-user_department-department_id}}',
            '{{%user_department}}'
        );

        $this->dropTable('{{%user_department}}');
    }
}
