<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%plant_schema}}`.
 */
class m210204_063441_create_plant_schema_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%plant_schema}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(255),
            'name_ru' => $this->string(255),
            'name_en' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%plant_schema}}');
    }
}
