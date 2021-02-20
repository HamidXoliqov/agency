<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%dep_bank_account}}`.
 */
class m200720_005109_add_status_bank_column_to_dep_bank_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%dep_bank_account}}', 'status_bank', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%dep_bank_account}}', 'status_bank');
    }
}
