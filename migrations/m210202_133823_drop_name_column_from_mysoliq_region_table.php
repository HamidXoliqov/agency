<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%mysoliq_region}}`.
 */
class m210202_133823_drop_name_column_from_mysoliq_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%mysoliq_region}}', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%mysoliq_region}}', 'name', $this->string());
    }
}
