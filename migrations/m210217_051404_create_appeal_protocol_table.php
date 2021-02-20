<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%appeal_protocol}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%appeal}}`
 * - `{{%subsidy_protocol}}`
 */
class m210217_051404_create_appeal_protocol_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%appeal_protocol}}', [
            'id' => $this->primaryKey(),
            'appeal_id' => $this->integer()->notNull(),
            'subsidy_protocol_id' => $this->integer()->notNull(),
            'total_sum' => $this->decimal(15,2),
            'self_sum' => $this->decimal(15,2),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `appeal_id`
        $this->createIndex(
            '{{%idx-appeal_protocol-appeal_id}}',
            '{{%appeal_protocol}}',
            'appeal_id'
        );

        // add foreign key for table `{{%appeal}}`
        $this->addForeignKey(
            '{{%fk-appeal_protocol-appeal_id}}',
            '{{%appeal_protocol}}',
            'appeal_id',
            '{{%appeal}}',
            'id',
            'CASCADE'
        );

        // creates index for column `subsidy_protocol_id`
        $this->createIndex(
            '{{%idx-appeal_protocol-subsidy_protocol_id}}',
            '{{%appeal_protocol}}',
            'subsidy_protocol_id'
        );

        // add foreign key for table `{{%subsidy_protocol}}`
        $this->addForeignKey(
            '{{%fk-appeal_protocol-subsidy_protocol_id}}',
            '{{%appeal_protocol}}',
            'subsidy_protocol_id',
            '{{%subsidy_protocol}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%appeal}}`
        $this->dropForeignKey(
            '{{%fk-appeal_protocol-appeal_id}}',
            '{{%appeal_protocol}}'
        );

        // drops index for column `appeal_id`
        $this->dropIndex(
            '{{%idx-appeal_protocol-appeal_id}}',
            '{{%appeal_protocol}}'
        );

        // drops foreign key for table `{{%subsidy_protocol}}`
        $this->dropForeignKey(
            '{{%fk-appeal_protocol-subsidy_protocol_id}}',
            '{{%appeal_protocol}}'
        );

        // drops index for column `subsidy_protocol_id`
        $this->dropIndex(
            '{{%idx-appeal_protocol-subsidy_protocol_id}}',
            '{{%appeal_protocol}}'
        );

        $this->dropTable('{{%appeal_protocol}}');
    }
}
