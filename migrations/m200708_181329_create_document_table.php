<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%document}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%contragent}}`
 * - `{{%department}}`
 * - `{{%department}}`
 */
class m200708_181329_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'document_type' => $this->smallInteger(),
            'doc_number' => $this->string(30),
            'reg_date' => $this->dateTime(),
            'contragent_id' => $this->integer(),
            'contragent_responsible' => $this->string(100),
            'from_department' => $this->integer(),
            'to_department' => $this->integer(),
            'from_employee' => $this->string(70),
            'to_employee' => $this->string(70),
            'add_info' => $this->string(255),
            'doc_status' => $this->integer()->defaultValue(1),
            'shipment' => $this->decimal(20, 4),
            'shipment_note' => $this->text(),
            'payment_amount' => $this->decimal(20,4),
            'payment_type' => $this->tinyInteger(),
            'payment_note' => $this->text(),
            'discount' => $this->decimal(20,4),
            'discount_type' => $this->tinyInteger(),
            'return_amount' => $this->decimal(20,4),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `contragent_id`
        $this->createIndex(
            '{{%idx-document-contragent_id}}',
            '{{%document}}',
            'contragent_id'
        );

        // add foreign key for table `{{%contragent}}`
        $this->addForeignKey(
            '{{%fk-document-contragent_id}}',
            '{{%document}}',
            'contragent_id',
            '{{%contragent}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `from_department`
        $this->createIndex(
            '{{%idx-document-from_department}}',
            '{{%document}}',
            'from_department'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-document-from_department}}',
            '{{%document}}',
            'from_department',
            '{{%department}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `to_department`
        $this->createIndex(
            '{{%idx-document-to_department}}',
            '{{%document}}',
            'to_department'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-document-to_department}}',
            '{{%document}}',
            'to_department',
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
        // drops foreign key for table `{{%contragent}}`
        $this->dropForeignKey(
            '{{%fk-document-contragent_id}}',
            '{{%document}}'
        );

        // drops index for column `contragent_id`
        $this->dropIndex(
            '{{%idx-document-contragent_id}}',
            '{{%document}}'
        );

        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-document-from_department}}',
            '{{%document}}'
        );

        // drops index for column `from_department`
        $this->dropIndex(
            '{{%idx-document-from_department}}',
            '{{%document}}'
        );

        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-document-to_department}}',
            '{{%document}}'
        );

        // drops index for column `to_department`
        $this->dropIndex(
            '{{%idx-document-to_department}}',
            '{{%document}}'
        );

        $this->dropTable('{{%document}}');
    }
}
