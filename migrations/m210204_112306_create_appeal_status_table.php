<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%appeal_status}}`.
 */
class m210204_112306_create_appeal_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%appeal_status}}', [
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
        $this->dropTable('{{%appeal_status}}');
    }
}
