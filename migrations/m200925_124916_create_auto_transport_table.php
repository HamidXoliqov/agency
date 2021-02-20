<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auto_transport}}`.
 */
class m200925_124916_create_auto_transport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auto_transport}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(),
            'name_ru' => $this->string(),
            'name_en' => $this->string(),
            'car_number' => $this->string(),
            'car_tel' => $this->string(),
            'status' => $this->smallInteger(),
            'type' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%auto_transport}}');
    }
}
