<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bank}}`.
 */
class m200707_150835_create_bank_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bank}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(50),
            'name_ru' => $this->string(50),
            'name_en' => $this->string(50),
            'mfo' => $this->string(50),
            'inn' => $this->string(50),
            'address' => $this->text(),
            'status' => $this->smallInteger(),
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
        $this->dropTable('{{%bank}}');
    }
}
