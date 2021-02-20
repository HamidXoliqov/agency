<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subsidy_protocol}}`.
 */
class m210216_060711_create_subsidy_protocol_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subsidy_protocol}}', [
            'id' => $this->primaryKey(),
            'protocol_number' => $this->string(20),
            'protocol_date' => $this->integer(),
            'file' => $this->string(255),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subsidy_protocol}}');
    }
}
