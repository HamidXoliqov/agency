<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_13_21_point}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project}}`
 */
class m201126_132400_create_project_13_21_point_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_13_21_point}}', [
            'id' => $this->primaryKey(),
            'assimilation_forecast_year' => $this->string(255)->comment("13"),
            'assimilation_forecast' => $this->string(255)->comment("14"),
            'mastered_fact' => $this->string(255)->comment("15"),
            'cmr' => $this->decimal(20,4)->comment("Promotion of international development - 16"),
            'equipment' => $this->decimal(20,4)->comment("17"),
            'import' => $this->decimal(20,4)->comment("18"),
            'other' => $this->decimal(20,4)->comment("19"),
            'predict_period' => $this->decimal(6,2)->comment("=15/14 - n% - 20"),
            'forecast_year' => $this->decimal(6,2)->comment("=15/13 - n% - 21"),
            'project_id' => $this->integer(),
            'order_number' => $this->smallInteger()->unsigned(),
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-project_13_21_point-project_id}}',
            '{{%project_13_21_point}}',
            'project_id'
        );

        // add foreign key for table `{{%project}}`
        $this->addForeignKey(
            '{{%fk-project_13_21_point-project_id}}',
            '{{%project_13_21_point}}',
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
            '{{%fk-project_13_21_point-project_id}}',
            '{{%project_13_21_point}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-project_13_21_point-project_id}}',
            '{{%project_13_21_point}}'
        );

        $this->dropTable('{{%project_13_21_point}}');
    }
}
