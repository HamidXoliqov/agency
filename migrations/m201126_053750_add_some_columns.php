<?php

use yii\db\Migration;

/**
 * Class m201126_053750_add_some_columns
 */
class m201126_053750_add_some_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("{{%contragent}}", 'inn', $this->string(9));
        $this->addColumn("{{%contragent}}", 'vatcode', $this->string(30));
        $this->addColumn("{{%contragent}}", 'contact_info', $this->string(255));
        $this->addColumn("{{%contragent}}", 'oked', $this->string(10));
        $this->addColumn("{{%contragent}}", 'accounter', $this->string(255));
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("{{%contragent}}", 'accounter');
        $this->dropColumn("{{%contragent}}", 'oked');
        $this->dropColumn("{{%contragent}}", 'contact_info');
        $this->dropColumn("{{%contragent}}", 'vatcode');
        $this->dropColumn("{{%contragent}}", 'inn');
    }
}
