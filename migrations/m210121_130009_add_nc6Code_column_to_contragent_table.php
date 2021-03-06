<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contragent}}`.
 */
class m210121_130009_add_nc6Code_column_to_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contragent}}', 'nc6Code', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contragent}}', 'nc6Code');
    }
}
