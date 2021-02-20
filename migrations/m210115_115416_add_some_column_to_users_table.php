<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m210115_115416_add_some_column_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'cert_key', $this->string(50));
        $this->addColumn('{{%users}}', 'cert_key_id', $this->string(100));
        $this->addColumn('{{%users}}', 'cert_serial', $this->string(20));
        $this->addColumn('{{%users}}', 'pkcs7', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'cert_key');
        $this->dropColumn('{{%users}}', 'cert_key_id');
        $this->dropColumn('{{%users}}', 'cert_serial');
        $this->dropColumn('{{%users}}', 'pkcs7');
    }
}
