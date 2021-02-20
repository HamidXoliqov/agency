<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mysoliq_region}}`.
 */
class m210129_113605_create_mysoliq_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mysoliq_region}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mysoliq_region}}');
    }
}
