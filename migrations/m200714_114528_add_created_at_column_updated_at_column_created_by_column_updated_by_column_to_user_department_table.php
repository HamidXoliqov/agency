<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user_department}}`.
 */
class m200714_114528_add_created_at_column_updated_at_column_created_by_column_updated_by_column_to_user_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_department}}', 'created_at', $this->integer());
        $this->addColumn('{{%user_department}}', 'updated_at', $this->integer());
        $this->addColumn('{{%user_department}}', 'created_by', $this->integer());
        $this->addColumn('{{%user_department}}', 'updated_by', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user_department}}', 'created_at');
        $this->dropColumn('{{%user_department}}', 'updated_at');
        $this->dropColumn('{{%user_department}}', 'created_by');
        $this->dropColumn('{{%user_department}}', 'updated_by');
    }
}
