<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%appeal_protocol_subsidy_type}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%appeal_protocol}}`
 * - `{{%subsidy_type}}`
 */
class m210217_051414_create_appeal_protocol_subsidy_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%appeal_protocol_subsidy_type}}', [
            'id' => $this->primaryKey(),
            'appeal_protocol_id' => $this->integer()->notNull(),
            'subsidy_type_id' => $this->integer()->notNull(),
            'sum' => $this->decimal(15,2),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `appeal_protocol_id`
        $this->createIndex(
            '{{%idx-appeal_protocol_subsidy_type-appeal_protocol_id}}',
            '{{%appeal_protocol_subsidy_type}}',
            'appeal_protocol_id'
        );

        // add foreign key for table `{{%appeal_protocol}}`
        $this->addForeignKey(
            '{{%fk-appeal_protocol_subsidy_type-appeal_protocol_id}}',
            '{{%appeal_protocol_subsidy_type}}',
            'appeal_protocol_id',
            '{{%appeal_protocol}}',
            'id',
            'CASCADE'
        );

        // creates index for column `subsidy_type_id`
        $this->createIndex(
            '{{%idx-appeal_protocol_subsidy_type-subsidy_type_id}}',
            '{{%appeal_protocol_subsidy_type}}',
            'subsidy_type_id'
        );

        // add foreign key for table `{{%subsidy_type}}`
        $this->addForeignKey(
            '{{%fk-appeal_protocol_subsidy_type-subsidy_type_id}}',
            '{{%appeal_protocol_subsidy_type}}',
            'subsidy_type_id',
            '{{%subsidy_type}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%appeal_protocol}}`
        $this->dropForeignKey(
            '{{%fk-appeal_protocol_subsidy_type-appeal_protocol_id}}',
            '{{%appeal_protocol_subsidy_type}}'
        );

        // drops index for column `appeal_protocol_id`
        $this->dropIndex(
            '{{%idx-appeal_protocol_subsidy_type-appeal_protocol_id}}',
            '{{%appeal_protocol_subsidy_type}}'
        );

        // drops foreign key for table `{{%subsidy_type}}`
        $this->dropForeignKey(
            '{{%fk-appeal_protocol_subsidy_type-subsidy_type_id}}',
            '{{%appeal_protocol_subsidy_type}}'
        );

        // drops index for column `subsidy_type_id`
        $this->dropIndex(
            '{{%idx-appeal_protocol_subsidy_type-subsidy_type_id}}',
            '{{%appeal_protocol_subsidy_type}}'
        );

        $this->dropTable('{{%appeal_protocol_subsidy_type}}');
    }
}
