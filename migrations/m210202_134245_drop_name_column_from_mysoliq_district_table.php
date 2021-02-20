<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%mysoliq_district}}`.
 */
class m210202_134245_drop_name_column_from_mysoliq_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%mysoliq_district}}', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%mysoliq_district}}', 'name', $this->string());
    }
}
