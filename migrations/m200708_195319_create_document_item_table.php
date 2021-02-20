<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%document_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%document}}`
 * - `{{%item}}`
 * - `{{%department_area}}`
 * - `{{%department_area}}`
 * - `{{%references_type}}`
 * - `{{%references_type}}`
 * - `{{%references_type}}`
 */
class m200708_195319_create_document_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document_item}}', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer(),
            'item_id' => $this->integer(),
            'lot' => $this->string(50),
            'document_quantity' => $this->decimal(20,6),
            'quantity' => $this->decimal(20,6),
            'residue_iquantity' => $this->decimal(20,6),
            'from_dep_area' => $this->integer(),
            'to_dep_area' => $this->integer(),
            'income_price' => $this->decimal(20,4),
            'income_currency' => $this->integer(),
            'price' => $this->decimal(20,4),
            'price_currency' => $this->integer(),
            'sell_price' => $this->decimal(20,4),
            'sell_currency' => $this->integer(),
            'add_info' => $this->string(),
            'returned_quantity' => $this->decimal(20, 4),
            'discount_type' => $this->tinyInteger(),
            'discount' => $this->decimal(20, 4),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `document_id`
        $this->createIndex(
            '{{%idx-document_item-document_id}}',
            '{{%document_item}}',
            'document_id'
        );

        // add foreign key for table `{{%document}}`
        $this->addForeignKey(
            '{{%fk-document_item-document_id}}',
            '{{%document_item}}',
            'document_id',
            '{{%document}}',
            'id',
            'CASCADE'
        );

        // creates index for column `item_id`
        $this->createIndex(
            '{{%idx-document_item-item_id}}',
            '{{%document_item}}',
            'item_id'
        );

        // add foreign key for table `{{%item}}`
        $this->addForeignKey(
            '{{%fk-document_item-item_id}}',
            '{{%document_item}}',
            'item_id',
            '{{%item}}',
            'id',
            'CASCADE'
        );

        // creates index for column `from_dep_area`
        $this->createIndex(
            '{{%idx-document_item-from_dep_area}}',
            '{{%document_item}}',
            'from_dep_area'
        );

        // add foreign key for table `{{%department_area}}`
        $this->addForeignKey(
            '{{%fk-document_item-from_dep_area}}',
            '{{%document_item}}',
            'from_dep_area',
            '{{%department_area}}',
            'id',
            'CASCADE'
        );

        // creates index for column `to_dep_area`
        $this->createIndex(
            '{{%idx-document_item-to_dep_area}}',
            '{{%document_item}}',
            'to_dep_area'
        );

        // add foreign key for table `{{%department_area}}`
        $this->addForeignKey(
            '{{%fk-document_item-to_dep_area}}',
            '{{%document_item}}',
            'to_dep_area',
            '{{%department_area}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `income_currency`
        $this->createIndex(
            '{{%idx-document_item-income_currency}}',
            '{{%document_item}}',
            'income_currency'
        );

        // add foreign key for table `{{%references_type}}`
        $this->addForeignKey(
            '{{%fk-document_item-income_currency}}',
            '{{%document_item}}',
            'income_currency',
            '{{%references}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `price_currency`
        $this->createIndex(
            '{{%idx-document_item-price_currency}}',
            '{{%document_item}}',
            'price_currency'
        );

        // add foreign key for table `{{%references_type}}`
        $this->addForeignKey(
            '{{%fk-document_item-price_currency}}',
            '{{%document_item}}',
            'price_currency',
            '{{%references}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `sell_currency`
        $this->createIndex(
            '{{%idx-document_item-sell_currency}}',
            '{{%document_item}}',
            'sell_currency'
        );

        // add foreign key for table `{{%references_type}}`
        $this->addForeignKey(
            '{{%fk-document_item-sell_currency}}',
            '{{%document_item}}',
            'sell_currency',
            '{{%references}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%document}}`
        $this->dropForeignKey(
            '{{%fk-document_item-document_id}}',
            '{{%document_item}}'
        );

        // drops index for column `document_id`
        $this->dropIndex(
            '{{%idx-document_item-document_id}}',
            '{{%document_item}}'
        );

        // drops foreign key for table `{{%item}}`
        $this->dropForeignKey(
            '{{%fk-document_item-item_id}}',
            '{{%document_item}}'
        );

        // drops index for column `item_id`
        $this->dropIndex(
            '{{%idx-document_item-item_id}}',
            '{{%document_item}}'
        );

        // drops foreign key for table `{{%department_area}}`
        $this->dropForeignKey(
            '{{%fk-document_item-from_dep_area}}',
            '{{%document_item}}'
        );

        // drops index for column `from_dep_area`
        $this->dropIndex(
            '{{%idx-document_item-from_dep_area}}',
            '{{%document_item}}'
        );

        // drops foreign key for table `{{%department_area}}`
        $this->dropForeignKey(
            '{{%fk-document_item-to_dep_area}}',
            '{{%document_item}}'
        );

        // drops index for column `to_dep_area`
        $this->dropIndex(
            '{{%idx-document_item-to_dep_area}}',
            '{{%document_item}}'
        );

        // drops foreign key for table `{{%references_type}}`
        $this->dropForeignKey(
            '{{%fk-document_item-income_currency}}',
            '{{%document_item}}'
        );

        // drops index for column `income_currency`
        $this->dropIndex(
            '{{%idx-document_item-income_currency}}',
            '{{%document_item}}'
        );

        // drops foreign key for table `{{%references_type}}`
        $this->dropForeignKey(
            '{{%fk-document_item-price_currency}}',
            '{{%document_item}}'
        );

        // drops index for column `price_currency`
        $this->dropIndex(
            '{{%idx-document_item-price_currency}}',
            '{{%document_item}}'
        );

        // drops foreign key for table `{{%references_type}}`
        $this->dropForeignKey(
            '{{%fk-document_item-sell_currency}}',
            '{{%document_item}}'
        );

        // drops index for column `sell_currency`
        $this->dropIndex(
            '{{%idx-document_item-sell_currency}}',
            '{{%document_item}}'
        );

        $this->dropTable('{{%document_item}}');
    }
}
