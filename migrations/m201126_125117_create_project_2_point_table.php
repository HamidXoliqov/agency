<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_2_point}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project}}`
 * - `{{%contragent}}`
 */
class m201126_125117_create_project_2_point_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_2_point}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'project_id' => $this->integer(),
            'contragent_id' => $this->integer(),
            'order_number' => $this->smallInteger()->unsigned(),
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-project_2_point-project_id}}',
            '{{%project_2_point}}',
            'project_id'
        );

        // add foreign key for table `{{%project}}`
        $this->addForeignKey(
            '{{%fk-project_2_point-project_id}}',
            '{{%project_2_point}}',
            'project_id',
            '{{%project}}',
            'id',
            'CASCADE'
        );

        // creates index for column `contragent_id`
        $this->createIndex(
            '{{%idx-project_2_point-contragent_id}}',
            '{{%project_2_point}}',
            'contragent_id'
        );

        // add foreign key for table `{{%contragent}}`
        $this->addForeignKey(
            '{{%fk-project_2_point-contragent_id}}',
            '{{%project_2_point}}',
            'contragent_id',
            '{{%contragent}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%project}}`
        $this->dropForeignKey(
            '{{%fk-project_2_point-project_id}}',
            '{{%project_2_point}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-project_2_point-project_id}}',
            '{{%project_2_point}}'
        );

        // drops foreign key for table `{{%contragent}}`
        $this->dropForeignKey(
            '{{%fk-project_2_point-contragent_id}}',
            '{{%project_2_point}}'
        );

        // drops index for column `contragent_id`
        $this->dropIndex(
            '{{%idx-project_2_point-contragent_id}}',
            '{{%project_2_point}}'
        );

        $this->dropTable('{{%project_2_point}}');
    }
}
