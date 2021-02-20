<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vat}}`.
 */
class m200708_181427_create_vat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vat}}', [
            'id' => $this->primaryKey(),
            'vat' => $this->decimal(20, 2),
            'department_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        
        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-vat-department_id}}',
            '{{%vat}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-vat-department_id}}',
            '{{%vat}}',
            'department_id',
            '{{%department}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vat}}');
    }
}
