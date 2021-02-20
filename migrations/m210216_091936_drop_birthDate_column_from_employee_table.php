<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%employee}}`.
 */
class m210216_091936_drop_birthDate_column_from_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%employee}}', 'birthDate');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%employee}}', 'birthDate', $this->date());
    }
}
