<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_subsidy_sub_work}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project_subsidy}}`
 */
class m210204_063524_create_project_subsidy_sub_work_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_subsidy_sub_work}}', [
            'id' => $this->primaryKey(),
            'project_subsidy_id' => $this->integer()->notNull(),
            'work_name' => $this->string(300),
            'price' => $this->decimal(15,2),
            'self_finance_sum' => $this->decimal(15,2),
            'subsidy_sum' => $this->decimal(15,2),
            'credit_sum' => $this->decimal(15,2),
        ]);

        // creates index for column `project_subsidy_id`
        $this->createIndex(
            '{{%idx-project_subsidy_sub_work-project_subsidy_id}}',
            '{{%project_subsidy_sub_work}}',
            'project_subsidy_id'
        );

        // add foreign key for table `{{%project_subsidy}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy_sub_work-project_subsidy_id}}',
            '{{%project_subsidy_sub_work}}',
            'project_subsidy_id',
            '{{%project_subsidy}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%project_subsidy}}`
        $this->dropForeignKey(
            '{{%fk-project_subsidy_sub_work-project_subsidy_id}}',
            '{{%project_subsidy_sub_work}}'
        );

        // drops index for column `project_subsidy_id`
        $this->dropIndex(
            '{{%idx-project_subsidy_sub_work-project_subsidy_id}}',
            '{{%project_subsidy_sub_work}}'
        );

        $this->dropTable('{{%project_subsidy_sub_work}}');
    }
}
