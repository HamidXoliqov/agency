<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%commission_members}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subsidy_protocol}}`
 */
class m210217_051342_create_commission_members_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%commission_members}}', [
            'id' => $this->primaryKey(),
            'subsidy_protocol_id' => $this->integer()->notNull(),
            'org_inn' => $this->string(20),
            'fullname' => $this->string(255),
            'org_name' => $this->string(255),
            'email' => $this->string(100),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `subsidy_protocol_id`
        $this->createIndex(
            '{{%idx-commission_members-subsidy_protocol_id}}',
            '{{%commission_members}}',
            'subsidy_protocol_id'
        );

        // add foreign key for table `{{%subsidy_protocol}}`
        $this->addForeignKey(
            '{{%fk-commission_members-subsidy_protocol_id}}',
            '{{%commission_members}}',
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
        // drops foreign key for table `{{%subsidy_protocol}}`
        $this->dropForeignKey(
            '{{%fk-commission_members-subsidy_protocol_id}}',
            '{{%commission_members}}'
        );

        // drops index for column `subsidy_protocol_id`
        $this->dropIndex(
            '{{%idx-commission_members-subsidy_protocol_id}}',
            '{{%commission_members}}'
        );

        $this->dropTable('{{%commission_members}}');
    }
}
