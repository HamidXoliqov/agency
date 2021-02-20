<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_subsidy_nav_type}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project_subsidy}}`
 * - `{{%nav_type}}`
 */
class m210204_063513_create_project_subsidy_nav_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_subsidy_nav_type}}', [
            'id' => $this->primaryKey(),
            'project_subsidy_id' => $this->integer()->notNull(),
            'nav_type_id' => $this->integer()->notNull(),
            'area_ga' => $this->decimal(11,3),
        ]);

        // creates index for column `project_subsidy_id`
        $this->createIndex(
            '{{%idx-project_subsidy_nav_type-project_subsidy_id}}',
            '{{%project_subsidy_nav_type}}',
            'project_subsidy_id'
        );

        // add foreign key for table `{{%project_subsidy}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy_nav_type-project_subsidy_id}}',
            '{{%project_subsidy_nav_type}}',
            'project_subsidy_id',
            '{{%project_subsidy}}',
            'id',
            'CASCADE'
        );

        // creates index for column `nav_type_id`
        $this->createIndex(
            '{{%idx-project_subsidy_nav_type-nav_type_id}}',
            '{{%project_subsidy_nav_type}}',
            'nav_type_id'
        );

        // add foreign key for table `{{%nav_type}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy_nav_type-nav_type_id}}',
            '{{%project_subsidy_nav_type}}',
            'nav_type_id',
            '{{%nav_type}}',
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
            '{{%fk-project_subsidy_nav_type-project_subsidy_id}}',
            '{{%project_subsidy_nav_type}}'
        );

        // drops index for column `project_subsidy_id`
        $this->dropIndex(
            '{{%idx-project_subsidy_nav_type-project_subsidy_id}}',
            '{{%project_subsidy_nav_type}}'
        );

        // drops foreign key for table `{{%nav_type}}`
        $this->dropForeignKey(
            '{{%fk-project_subsidy_nav_type-nav_type_id}}',
            '{{%project_subsidy_nav_type}}'
        );

        // drops index for column `nav_type_id`
        $this->dropIndex(
            '{{%idx-project_subsidy_nav_type-nav_type_id}}',
            '{{%project_subsidy_nav_type}}'
        );

        $this->dropTable('{{%project_subsidy_nav_type}}');
    }
}
