<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_22_26_point}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project}}`
 */
class m201126_133640_create_project_22_26_point_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_22_26_point}}', [
            'id' => $this->primaryKey(),
            'forecast_attracting_finance' => $this->decimal(20,4)->comment("22"),
            'Forecast_attracting_finance' => $this->decimal(20,4)->comment("23"),
            'involved fact' => $this->decimal(20,4)->comment("24"),
            'forecast_period' => $this->decimal(5,2)->comment("25"),
            'forecast_year' => $this->decimal(5,2)->comment("26"),
            'project_id' => $this->integer(),
            'order_number' => $this->smallInteger()->unsigned(),
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-project_22_26_point-project_id}}',
            '{{%project_22_26_point}}',
            'project_id'
        );

        // add foreign key for table `{{%project}}`
        $this->addForeignKey(
            '{{%fk-project_22_26_point-project_id}}',
            '{{%project_22_26_point}}',
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
            '{{%fk-project_22_26_point-project_id}}',
            '{{%project_22_26_point}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-project_22_26_point-project_id}}',
            '{{%project_22_26_point}}'
        );

        $this->dropTable('{{%project_22_26_point}}');
    }
}
