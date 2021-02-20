<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%users}}`.
 */
class m210217_115914_drop_table_number_column_from_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%users}}', 'table_number');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%users}}', 'table_number', $this->string());
    }
}
