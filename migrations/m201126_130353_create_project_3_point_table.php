<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_3_point}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%region}}`
 * - `{{%project}}`
 */
class m201126_130353_create_project_3_point_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_3_point}}', [
            'id' => $this->primaryKey(),
            'region_id' => $this->integer(),
            'district_id' => $this->integer(),
            'address1' => $this->string(255),
            'address2' => $this->string(255),
            'project_id' => $this->integer(),
            'order_number' => $this->smallInteger()->unsigned(),
        ]);

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-project_3_point-region_id}}',
            '{{%project_3_point}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-project_3_point-region_id}}',
            '{{%project_3_point}}',
            'region_id',
            '{{%regions}}',
            'id',
            'CASCADE'
        );

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-project_3_point-project_id}}',
            '{{%project_3_point}}',
            'project_id'
        );

        // add foreign key for table `{{%project}}`
        $this->addForeignKey(
            '{{%fk-project_3_point-project_id}}',
            '{{%project_3_point}}',
            'project_id',
            '{{%project}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-project_3_point-region_id}}',
            '{{%project_3_point}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-project_3_point-region_id}}',
            '{{%project_3_point}}'
        );

        // drops foreign key for table `{{%project}}`
        $this->dropForeignKey(
            '{{%fk-project_3_point-project_id}}',
            '{{%project_3_point}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-project_3_point-project_id}}',
            '{{%project_3_point}}'
        );

        $this->dropTable('{{%project_3_point}}');
    }
}
