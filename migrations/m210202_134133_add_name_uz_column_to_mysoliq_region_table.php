<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%mysoliq_region}}`.
 */
class m210202_134133_add_name_uz_column_to_mysoliq_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%mysoliq_region}}', 'name_uz', $this->string());
        $this->addColumn('{{%mysoliq_region}}', 'name_ru', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%mysoliq_region}}', 'name_uz');
        $this->dropColumn('{{%mysoliq_region}}', 'name_ru');
    }
}
