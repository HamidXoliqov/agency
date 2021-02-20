<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%license}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department}}`
 * - `{{%item_category}}`
 */
class m200708_172656_create_license_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%license}}', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string(),
            'serial' => $this->string(),
            'order_number' => $this->string(),
            'item_category_id' => $this->integer(),
            'order_date' => $this->date(),
            'given_date' => $this->date(),
            'expiration_date' => $this->date(),
            'responsible' => $this->string(),
            'department_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-license-department_id}}',
            '{{%license}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-license-department_id}}',
            '{{%license}}',
            'department_id',
            '{{%department}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `item_category_id`
        $this->createIndex(
            '{{%idx-license-item_category_id}}',
            '{{%license}}',
            'item_category_id'
        );

        // add foreign key for table `{{%item_category}}`
        $this->addForeignKey(
            '{{%fk-license-item_category_id}}',
            '{{%license}}',
            'item_category_id',
            '{{%item_category}}',
            'id',
            'RESTRICT'
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-license-department_id}}',
            '{{%license}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-license-department_id}}',
            '{{%license}}'
        );

        // drops foreign key for table `{{%item_category}}`
        $this->dropForeignKey(
            '{{%fk-license-item_category_id}}',
            '{{%license}}'
        );

        // drops index for column `item_category_id`
        $this->dropIndex(
            '{{%idx-license-item_category_id}}',
            '{{%license}}'
        );

        $this->dropTable('{{%license}}');
    }
}
