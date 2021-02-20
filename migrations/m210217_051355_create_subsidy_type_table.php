<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subsidy_type}}`.
 */
class m210217_051355_create_subsidy_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subsidy_type}}', [
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
        $this->dropTable('{{%subsidy_type}}');
    }
}
