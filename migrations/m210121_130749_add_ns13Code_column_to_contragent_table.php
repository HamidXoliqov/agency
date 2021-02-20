<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contragent}}`.
 */
class m210121_130749_add_ns13Code_column_to_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contragent}}', 'ns13Code', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contragent}}', 'ns13Code');
    }
}
