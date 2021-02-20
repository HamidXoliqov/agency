<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%appeal}}`.
 */
class m210216_060721_add_column_to_appeal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%appeal}}', 'subsidy_protocol_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%appeal}}', 'subsidy_protocol_id');
    }
}
