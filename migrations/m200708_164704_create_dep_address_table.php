<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dep_address}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%regions}}`
 * - `{{%regions}}`
 */
class m200708_164704_create_dep_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dep_address}}', [
            'id' => $this->primaryKey(),
            'physical_region' => $this->integer(),
            'physical_location' => $this->string(),
            'legal_region' => $this->integer(),
            'legal_location' => $this->string(),
            'tel' => $this->string(),
            'email' => $this->string(),
            'department_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `physical_region`
        $this->createIndex(
            '{{%idx-dep_address-physical_region}}',
            '{{%dep_address}}',
            'physical_region'
        );

        // add foreign key for table `{{%regions}}`
        $this->addForeignKey(
            '{{%fk-dep_address-physical_region}}',
            '{{%dep_address}}',
            'physical_region',
            '{{%regions}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `legal_region`
        $this->createIndex(
            '{{%idx-dep_address-legal_region}}',
            '{{%dep_address}}',
            'legal_region'
        );

        // add foreign key for table `{{%regions}}`
        $this->addForeignKey(
            '{{%fk-dep_address-legal_region}}',
            '{{%dep_address}}',
            'legal_region',
            '{{%regions}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-dep_address-department_id}}',
            '{{%dep_address}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-dep_address-department_id}}',
            '{{%dep_address}}',
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
        // drops foreign key for table `{{%regions}}`
        $this->dropForeignKey(
            '{{%fk-dep_address-physical_region}}',
            '{{%dep_address}}'
        );

        // drops index for column `physical_region`
        $this->dropIndex(
            '{{%idx-dep_address-physical_region}}',
            '{{%dep_address}}'
        );

        // drops foreign key for table `{{%regions}}`
        $this->dropForeignKey(
            '{{%fk-dep_address-legal_region}}',
            '{{%dep_address}}'
        );

        // drops index for column `legal_region`
        $this->dropIndex(
            '{{%idx-dep_address-legal_region}}',
            '{{%dep_address}}'
        );

        $this->dropTable('{{%dep_address}}');
    }
}
