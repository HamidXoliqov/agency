<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dep_bank_account}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%bank}}`
 * - `{{%references}}`
 */
class m200708_165429_create_dep_bank_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dep_bank_account}}', [
            'id' => $this->primaryKey(),
            'bank_account' => $this->string(),
            'bank' => $this->integer(),
            'account_type' => $this->integer(),
            'department_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `bank`
        $this->createIndex(
            '{{%idx-dep_bank_account-bank}}',
            '{{%dep_bank_account}}',
            'bank'
        );

        // add foreign key for table `{{%bank}}`
        $this->addForeignKey(
            '{{%fk-dep_bank_account-bank}}',
            '{{%dep_bank_account}}',
            'bank',
            '{{%bank}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `account_type`
        $this->createIndex(
            '{{%idx-dep_bank_account-account_type}}',
            '{{%dep_bank_account}}',
            'account_type'
        );

        // add foreign key for table `{{%references}}`
        $this->addForeignKey(
            '{{%fk-dep_bank_account-account_type}}',
            '{{%dep_bank_account}}',
            'account_type',
            '{{%references}}',
            'id',
            'RESTRICT'
        );
        
        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-dep_bank_account-department_id}}',
            '{{%dep_bank_account}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-dep_bank_account-department_id}}',
            '{{%dep_bank_account}}',
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
        // drops foreign key for table `{{%bank}}`
        $this->dropForeignKey(
            '{{%fk-dep_bank_account-bank}}',
            '{{%dep_bank_account}}'
        );

        // drops index for column `bank`
        $this->dropIndex(
            '{{%idx-dep_bank_account-bank}}',
            '{{%dep_bank_account}}'
        );

        // drops foreign key for table `{{%references}}`
        $this->dropForeignKey(
            '{{%fk-dep_bank_account-account_type}}',
            '{{%dep_bank_account}}'
        );

        // drops index for column `account_type`
        $this->dropIndex(
            '{{%idx-dep_bank_account-account_type}}',
            '{{%dep_bank_account}}'
        );

        $this->dropTable('{{%dep_bank_account}}');
    }
}
