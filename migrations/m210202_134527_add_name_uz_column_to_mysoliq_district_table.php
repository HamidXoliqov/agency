<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%mysoliq_district}}`.
 */
class m210202_134527_add_name_uz_column_to_mysoliq_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%mysoliq_district}}', 'name_uz', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%mysoliq_district}}', 'name_uz');
    }
}
