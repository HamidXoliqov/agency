<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%employee}}`.
 */
class m210203_134320_drop_phone_column_from_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%employee}}', 'phone');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%employee}}', 'phone', $this->bigInteger());
    }
}
