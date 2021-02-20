<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contragent}}`.
 */
class m210121_130610_add_ns3Code_column_to_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contragent}}', 'ns3Code', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contragent}}', 'ns3Code');
    }
}
