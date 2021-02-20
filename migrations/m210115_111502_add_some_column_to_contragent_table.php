<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contragent}}`.
 */
class m210115_111502_add_some_column_to_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contragent}}', 'accounter_inn', $this->string(15));
        $this->addColumn('{{%contragent}}', 'accounter_tel', $this->string(50));
        $this->addColumn('{{%contragent}}', 'director_inn', $this->string(15));
        $this->addColumn('{{%contragent}}', 'region_id', $this->integer());
        $this->addColumn('{{%contragent}}', 'district_id', $this->integer());
        $this->addColumn('{{%contragent}}', 'bank', $this->string(150));
        $this->addColumn('{{%contragent}}', 'bank_code', $this->string(100));
        $this->addColumn('{{%contragent}}', 'bank_account_number', $this->string(100));
        $this->addColumn('{{%contragent}}', 'fund', $this->string(50));
        $this->addColumn('{{%contragent}}', 'reg_date', $this->datetime());
        $this->addColumn('{{%contragent}}', 'reg_num', $this->string(20));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contragent}}', 'region_id');
        $this->dropColumn('{{%contragent}}', 'district_id');
        $this->dropColumn('{{%contragent}}', 'bank_account_number');
        $this->dropColumn('{{%contragent}}', 'fund');
        $this->dropColumn('{{%contragent}}', 'director_inn');
        $this->dropColumn('{{%contragent}}', 'accounter_inn');
        $this->dropColumn('{{%contragent}}', 'accounter_tel');
        $this->dropColumn('{{%contragent}}', 'reg_date');
        $this->dropColumn('{{%contragent}}', 'reg_num');
    }
}
