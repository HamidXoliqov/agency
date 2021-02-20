<?php

use yii\db\Migration;

/**
 * Class m210208_093730_update_column_project_subsidy_table
 */
class m210208_093730_alter_column_project_subsidy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn( '{{%project_subsidy}}', 'plant_schema_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn( '{{%project_subsidy}}', 'plant_schema_id', $this->integer()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210208_093730_update_column_project_subsidy_table cannot be reverted.\n";

        return false;
    }
    */
}
