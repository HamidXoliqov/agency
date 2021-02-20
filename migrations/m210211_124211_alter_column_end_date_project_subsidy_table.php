<?php

use yii\db\Migration;

/**
 * Class m210211_124211_alter_column_end_date_project_subsidy_table
 */
class m210211_124211_alter_column_end_date_project_subsidy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%project_subsidy}}', 'end_date', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%project_subsidy}}', 'end_date', $this->date());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210211_124211_alter_column_end_date_project_subsidy_table cannot be reverted.\n";

        return false;
    }
    */
}
