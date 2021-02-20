<?php

use yii\db\Migration;

/**
 * Class m201127_104423_alter_some_columns
 */
class m201127_104423_alter_some_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%project_22_26_point}}', 'involved fact', 'involved_fact');
        $this->dropColumn('project_22_26_point', 'Forecast_attracting_finance');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('{{%project_22_26_point}}', 'involved_fact', 'involved fact' );
        $this->addColumn('project_22_26_point', 'Forecast_attracting_finance', $this->decimal(20,4));

    }

}
