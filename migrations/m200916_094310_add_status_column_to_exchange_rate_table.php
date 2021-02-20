<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%exchange_rate}}`.
 */
class m200916_094310_add_status_column_to_exchange_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%exchange_rate}}', 'status', $this->tinyInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%exchange_rate}}', 'status');
    }
}
