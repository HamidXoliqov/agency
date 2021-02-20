<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%appeal}}`.
 */
class m210211_104531_add_column_to_appeal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%appeal}}', 'status_at', $this->integer());
        $this->addColumn('{{%appeal}}', 'status_by', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%appeal}}', 'status_at');
        $this->dropColumn('{{%appeal}}', 'status_by');
    }
}
