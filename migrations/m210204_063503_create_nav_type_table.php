<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nav_type}}`.
 */
class m210204_063503_create_nav_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nav_type}}', [
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
        $this->dropTable('{{%nav_type}}');
    }
}
