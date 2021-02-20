<?php

use yii\db\Migration;

/**
 * Class m210205_083621_add_create_update_to_all_column_table
 */
class m210205_083621_add_create_update_to_all_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%plant_schema}}', 'created_at', $this->integer());
        $this->addColumn('{{%plant_schema}}', 'updated_at', $this->integer());
        $this->addColumn('{{%plant_schema}}', 'created_by', $this->integer());
        $this->addColumn('{{%plant_schema}}', 'updated_by', $this->integer());

        $this->addColumn('{{%project_subsidy}}', 'created_at', $this->integer());
        $this->addColumn('{{%project_subsidy}}', 'updated_at', $this->integer());
        $this->addColumn('{{%project_subsidy}}', 'created_by', $this->integer());
        $this->addColumn('{{%project_subsidy}}', 'updated_by', $this->integer());

        $this->addColumn('{{%nav_type}}', 'created_at', $this->integer());
        $this->addColumn('{{%nav_type}}', 'updated_at', $this->integer());
        $this->addColumn('{{%nav_type}}', 'created_by', $this->integer());
        $this->addColumn('{{%nav_type}}', 'updated_by', $this->integer());

        $this->addColumn('{{%project_subsidy_nav_type}}', 'created_at', $this->integer());
        $this->addColumn('{{%project_subsidy_nav_type}}', 'updated_at', $this->integer());
        $this->addColumn('{{%project_subsidy_nav_type}}', 'created_by', $this->integer());
        $this->addColumn('{{%project_subsidy_nav_type}}', 'updated_by', $this->integer());

        $this->addColumn('{{%project_subsidy_sub_work}}', 'created_at', $this->integer());
        $this->addColumn('{{%project_subsidy_sub_work}}', 'updated_at', $this->integer());
        $this->addColumn('{{%project_subsidy_sub_work}}', 'created_by', $this->integer());
        $this->addColumn('{{%project_subsidy_sub_work}}', 'updated_by', $this->integer());

        $this->addColumn('{{%status_timeline}}', 'created_at', $this->integer());
        $this->addColumn('{{%status_timeline}}', 'updated_at', $this->integer());
        $this->addColumn('{{%status_timeline}}', 'created_by', $this->integer());
        $this->addColumn('{{%status_timeline}}', 'updated_by', $this->integer());

        $this->addColumn('{{%appeal_status}}', 'created_at', $this->integer());
        $this->addColumn('{{%appeal_status}}', 'updated_at', $this->integer());
        $this->addColumn('{{%appeal_status}}', 'created_by', $this->integer());
        $this->addColumn('{{%appeal_status}}', 'updated_by', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%plant_schema}}', 'created_at');
        $this->dropColumn('{{%plant_schema}}', 'updated_at');
        $this->dropColumn('{{%plant_schema}}', 'created_by');
        $this->dropColumn('{{%plant_schema}}', 'updated_by');

        $this->dropColumn('{{%project_subsidy}}', 'created_at');
        $this->dropColumn('{{%project_subsidy}}', 'updated_at');
        $this->dropColumn('{{%project_subsidy}}', 'created_by');
        $this->dropColumn('{{%project_subsidy}}', 'updated_by');

        $this->dropColumn('{{%nav_type}}', 'created_at');
        $this->dropColumn('{{%nav_type}}', 'updated_at');
        $this->dropColumn('{{%nav_type}}', 'created_by');
        $this->dropColumn('{{%nav_type}}', 'updated_by');

        $this->dropColumn('{{%project_subsidy_nav_type}}', 'created_at');
        $this->dropColumn('{{%project_subsidy_nav_type}}', 'updated_at');
        $this->dropColumn('{{%project_subsidy_nav_type}}', 'created_by');
        $this->dropColumn('{{%project_subsidy_nav_type}}', 'updated_by');

        $this->dropColumn('{{%project_subsidy_sub_work}}', 'created_at');
        $this->dropColumn('{{%project_subsidy_sub_work}}', 'updated_at');
        $this->dropColumn('{{%project_subsidy_sub_work}}', 'created_by');
        $this->dropColumn('{{%project_subsidy_sub_work}}', 'updated_by');

        $this->dropColumn('{{%status_timeline}}', 'created_at');
        $this->dropColumn('{{%status_timeline}}', 'updated_at');
        $this->dropColumn('{{%status_timeline}}', 'created_by');
        $this->dropColumn('{{%status_timeline}}', 'updated_by');

        $this->dropColumn('{{%appeal_status}}', 'created_at');
        $this->dropColumn('{{%appeal_status}}', 'updated_at');
        $this->dropColumn('{{%appeal_status}}', 'created_by');
        $this->dropColumn('{{%appeal_status}}', 'updated_by');
    }

}
