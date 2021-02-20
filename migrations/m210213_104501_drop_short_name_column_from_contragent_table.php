<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%contragent}}`.
 */
class m210213_104501_drop_short_name_column_from_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%contragent}}', 'short_name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%contragent}}', 'short_name', $this->string(50));
    }
}
