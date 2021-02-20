<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_barcode}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item}}`
 */
class m200708_123702_create_item_barcode_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item_barcode}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(),
            'barcode' => $this->string(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `item_id`
        $this->createIndex(
            '{{%idx-item_barcode-item_id}}',
            '{{%item_barcode}}',
            'item_id'
        );

        // add foreign key for table `{{%item}}`
        $this->addForeignKey(
            '{{%fk-item_barcode-item_id}}',
            '{{%item_barcode}}',
            'item_id',
            '{{%item}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%item}}`
        $this->dropForeignKey(
            '{{%fk-item_barcode-item_id}}',
            '{{%item_barcode}}'
        );

        // drops index for column `item_id`
        $this->dropIndex(
            '{{%idx-item_barcode-item_id}}',
            '{{%item_barcode}}'
        );

        $this->dropTable('{{%item_barcode}}');
    }
}
