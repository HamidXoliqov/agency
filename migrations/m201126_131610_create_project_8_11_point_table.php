<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_8_11_point}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project}}`
 */
class m201126_131610_create_project_8_11_point_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_8_11_point}}', [
            'id' => $this->primaryKey(),
            'own_funds' => $this->decimal(20,4)->comment("8"),
            'fdi' => $this->decimal(20,4)->comment("foreign direct investment - 9"),
            'fund_resources' => $this->decimal(20,4)->comment("10"),
            'bank_loans' => $this->decimal(20,4)->comment("11"),
            'project_id' => $this->integer(),
            'order_number' => $this->smallInteger()->unsigned(),
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-project_8_11_point-project_id}}',
            '{{%project_8_11_point}}',
            'project_id'
        );

        // add foreign key for table `{{%project}}`
        $this->addForeignKey(
            '{{%fk-project_8_11_point-project_id}}',
            '{{%project_8_11_point}}',
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
        // drops foreign key for table `{{%project}}`
        $this->dropForeignKey(
            '{{%fk-project_8_11_point-project_id}}',
            '{{%project_8_11_point}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-project_8_11_point-project_id}}',
            '{{%project_8_11_point}}'
        );

        $this->dropTable('{{%project_8_11_point}}');
    }
}
