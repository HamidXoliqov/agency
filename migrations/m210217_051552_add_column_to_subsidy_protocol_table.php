<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%subsidy_protocol}}`.
 */
class m210217_051552_add_column_to_subsidy_protocol_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%subsidy_protocol}}', 'status', $this->integer());
        $this->addColumn('{{%subsidy_protocol}}', 'total_sum', $this->decimal(15,2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%subsidy_protocol}}', 'status');
        $this->dropColumn('{{%subsidy_protocol}}', 'total_sum');
    }
}
