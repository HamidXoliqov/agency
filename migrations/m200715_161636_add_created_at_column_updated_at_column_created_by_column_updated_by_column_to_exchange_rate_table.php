<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%exchange_rate}}`.
 */
class m200715_161636_add_created_at_column_updated_at_column_created_by_column_updated_by_column_to_exchange_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%exchange_rate}}', 'created_at', $this->integer());
        $this->addColumn('{{%exchange_rate}}', 'updated_at', $this->integer());
        $this->addColumn('{{%exchange_rate}}', 'created_by', $this->integer());
        $this->addColumn('{{%exchange_rate}}', 'updated_by', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%exchange_rate}}', 'created_at');
        $this->dropColumn('{{%exchange_rate}}', 'updated_at');
        $this->dropColumn('{{%exchange_rate}}', 'created_by');
        $this->dropColumn('{{%exchange_rate}}', 'updated_by');
    }
}
