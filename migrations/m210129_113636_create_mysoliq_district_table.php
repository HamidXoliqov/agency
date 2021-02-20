<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mysoliq_district}}`.
 */
class m210129_113636_create_mysoliq_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mysoliq_district}}', [
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
        $this->dropTable('{{%mysoliq_district}}');
    }
}
