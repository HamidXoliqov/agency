<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%mysoliq_district}}`.
 */
class m210202_134648_add_name_ru_column_to_mysoliq_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%mysoliq_district}}', 'name_ru', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%mysoliq_district}}', 'name_ru');
    }
}
