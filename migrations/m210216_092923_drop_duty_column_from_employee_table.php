<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%employee}}`.
 */
class m210216_092923_drop_duty_column_from_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%employee}}', 'duty');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%employee}}', 'duty', $this->boolean());
    }
}
