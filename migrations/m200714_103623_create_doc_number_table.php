<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%doc_number}}`.
 */
class m200714_103623_create_doc_number_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE SEQUENCE doc_number start 1 increment 1");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP SEQUENCE doc_number");

        $this->alterColumn('document', 'doc_number', $this->string(255)->notNull());
    }
}
