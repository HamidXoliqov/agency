<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contragent}}`.
 */
class m210121_130929_add_na1Name_column_to_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contragent}}', 'na1Name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contragent}}', 'na1Name');
    }
}
