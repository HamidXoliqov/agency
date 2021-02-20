<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%mysoliq_district}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%mysoliq_region}}`
 */
class m210202_112216_add_region_code_column_to_mysoliq_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%mysoliq_district}}', 'region_code', $this->integer());

        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        

        $this->dropColumn('{{%mysoliq_district}}', 'region_code');
    }
}
