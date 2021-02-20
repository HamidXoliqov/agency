<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%appeal}}`.
 */
class m210216_055727_add_column_to_appeal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%appeal}}', 'cert_key', $this->string(50));
        $this->addColumn('{{%appeal}}', 'cert_key_id', $this->string(100));
        $this->addColumn('{{%appeal}}', 'cert_serial', $this->string(20));
        $this->addColumn('{{%appeal}}', 'pkcs7', $this->text());
        $this->addColumn('{{%appeal}}', 'action_expire_date', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%appeal}}', 'cert_key');
        $this->dropColumn('{{%appeal}}', 'cert_key_id');
        $this->dropColumn('{{%appeal}}', 'cert_serial');
        $this->dropColumn('{{%appeal}}', 'pkcs7');
        $this->dropColumn('{{%appeal}}', 'action_expire_date');
    }
}
