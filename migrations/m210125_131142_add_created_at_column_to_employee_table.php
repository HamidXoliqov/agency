<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%employee}}`.
 */
class m210125_131142_add_created_at_column_to_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%employee}}', 'created_at', $this->integer());
        $this->addColumn('{{%employee}}', 'updated_at', $this->integer());
        $this->addColumn('{{%employee}}', 'created_by', $this->integer());
        $this->addColumn('{{%employee}}', 'updated_by', $this->integer());
        $this->addColumn('{{%employee}}', 'status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%employee}}', 'created_at');
        $this->dropColumn('{{%employee}}', 'updated_at');
        $this->dropColumn('{{%employee}}', 'created_by');
        $this->dropColumn('{{%employee}}', 'updated_by');
        $this->dropColumn('{{%employee}}', 'status');
    }
}
