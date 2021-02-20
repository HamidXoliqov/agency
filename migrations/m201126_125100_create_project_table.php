<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%references}}`
 * - `{{%references}}`
 */
class m201126_125100_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("x"),
            'deadline_date' => $this->datetime()->comment("3"),
            'project_capacity' => $this->string(255)->comment("5"),
            'total_cost' => $this->decimal(20,4)->comment("7"),
            'total_cost_currency_id' => $this->integer()->comment("7"),
            'reamin_on_year_begin' => $this->decimal(20,4)->comment("12"),
            'remain_on_year_begin_currency_id' => $this->integer()->comment("12"),
            'assimilation' => $this->string(255)->comment("13"),
            'production_time' => $this->datetime()->comment("38"),
            'delivery_time' => $this->datetime()->comment("39"),
            'installation_time' => $this->datetime()->comment("40"),
            'add_info' => $this->string(4096)->comment("42"),
            'status' => $this->tinyInteger()->defaultValue(\app\models\BaseModel::STATUS_ACTIVE),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `total_cost_currency_id`
        $this->createIndex(
            '{{%idx-project-total_cost_currency_id}}',
            '{{%project}}',
            'total_cost_currency_id'
        );

        // add foreign key for table `{{%references}}`
        $this->addForeignKey(
            '{{%fk-project-total_cost_currency_id}}',
            '{{%project}}',
            'total_cost_currency_id',
            '{{%references}}',
            'id',
            'CASCADE'
        );

        // creates index for column `remain_on_year_begin_currency_id`
        $this->createIndex(
            '{{%idx-project-remain_on_year_begin_currency_id}}',
            '{{%project}}',
            'remain_on_year_begin_currency_id'
        );

        // add foreign key for table `{{%references}}`
        $this->addForeignKey(
            '{{%fk-project-remain_on_year_begin_currency_id}}',
            '{{%project}}',
            'remain_on_year_begin_currency_id',
            '{{%references}}',
            'id',
            'CASCADE'
        );


        $this->createIndex(
            '{{%idx-project-created_by}}',
            '{{%project}}',
            'created_by'
        );
        $this->addForeignKey(
            '{{%fk-project-created_by}}',
            '{{%project}}',
            'created_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            '{{%idx-project-updated_by}}',
            '{{%project}}',
            'updated_by'
        );
        $this->addForeignKey(
            '{{%fk-project-updated_by}}',
            '{{%project}}',
            'updated_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%references}}`
        $this->dropForeignKey(
            '{{%fk-project-total_cost_currency_id}}',
            '{{%project}}'
        );

        // drops index for column `total_cost_currency_id`
        $this->dropIndex(
            '{{%idx-project-total_cost_currency_id}}',
            '{{%project}}'
        );

        // drops foreign key for table `{{%references}}`
        $this->dropForeignKey(
            '{{%fk-project-remain_on_year_begin_currency_id}}',
            '{{%project}}'
        );

        // drops index for column `remain_on_year_begin_currency_id`
        $this->dropIndex(
            '{{%idx-project-remain_on_year_begin_currency_id}}',
            '{{%project}}'
        );

        $this->dropTable('{{%project}}');
    }
}
