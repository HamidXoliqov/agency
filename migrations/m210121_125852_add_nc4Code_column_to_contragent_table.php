<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contragent}}`.
 */
class m210121_125852_add_nc4Code_column_to_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contragent}}', 'nc4Code', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contragent}}', 'nc4Code');
    }
}
