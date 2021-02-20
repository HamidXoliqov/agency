<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_subsidy}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%appeal}}`
 * - `{{%contragent}}`
 * - `{{%regions}}`
 * - `{{%regions}}`
 * - `{{%plant_schema}}`
 * - `{{%references}}`
 */
class m210204_063451_create_project_subsidy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_subsidy}}', [
            'id' => $this->primaryKey(),
            'appeal_id' => $this->integer()->notNull(),
            'contragent_id' => $this->integer()->notNull(),
            'region_id' => $this->integer(),
            'district_id' => $this->integer(),
            'contur_number' => $this->integer(),
            'counter_ga' => $this->integer(),
            'water_pump_count' => $this->integer(),
            'bonitet_ball' => $this->integer(),
            'plant_all_area_ga' => $this->decimal(11,3),
            'plant_address' => $this->string(255),
            'plant_schema_id' => $this->integer()->notNull(),
            'plant_all_count' => $this->integer(),
            'end_date' => $this->date(),
            'job_count' => $this->integer(),
            'project_all_price' => $this->decimal(15,2),
            'project_all_price_currency_id' => $this->integer(),
            'status_project' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);

        // creates index for column `appeal_id`
        $this->createIndex(
            '{{%idx-project_subsidy-appeal_id}}',
            '{{%project_subsidy}}',
            'appeal_id'
        );

        // add foreign key for table `{{%appeal}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy-appeal_id}}',
            '{{%project_subsidy}}',
            'appeal_id',
            '{{%appeal}}',
            'id',
            'CASCADE'
        );

        // creates index for column `contragent_id`
        $this->createIndex(
            '{{%idx-project_subsidy-contragent_id}}',
            '{{%project_subsidy}}',
            'contragent_id'
        );

        // add foreign key for table `{{%contragent}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy-contragent_id}}',
            '{{%project_subsidy}}',
            'contragent_id',
            '{{%contragent}}',
            'id',
            'CASCADE'
        );

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-project_subsidy-region_id}}',
            '{{%project_subsidy}}',
            'region_id'
        );

        // add foreign key for table `{{%regions}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy-region_id}}',
            '{{%project_subsidy}}',
            'region_id',
            '{{%regions}}',
            'id',
            'CASCADE'
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-project_subsidy-district_id}}',
            '{{%project_subsidy}}',
            'district_id'
        );

        // add foreign key for table `{{%regions}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy-district_id}}',
            '{{%project_subsidy}}',
            'district_id',
            '{{%regions}}',
            'id',
            'CASCADE'
        );

        // creates index for column `plant_schema_id`
        $this->createIndex(
            '{{%idx-project_subsidy-plant_schema_id}}',
            '{{%project_subsidy}}',
            'plant_schema_id'
        );

        // add foreign key for table `{{%plant_schema}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy-plant_schema_id}}',
            '{{%project_subsidy}}',
            'plant_schema_id',
            '{{%plant_schema}}',
            'id',
            'CASCADE'
        );

        // creates index for column `project_all_price_currency_id`
        $this->createIndex(
            '{{%idx-project_subsidy-project_all_price_currency_id}}',
            '{{%project_subsidy}}',
            'project_all_price_currency_id'
        );

        // add foreign key for table `{{%references}}`
        $this->addForeignKey(
            '{{%fk-project_subsidy-project_all_price_currency_id}}',
            '{{%project_subsidy}}',
            'project_all_price_currency_id',
            '{{%references}}',
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
            '{{%fk-project_subsidy-appeal_id}}',
            '{{%project_subsidy}}'
        );

        // drops index for column `appeal_id`
        $this->dropIndex(
            '{{%idx-project_subsidy-appeal_id}}',
            '{{%project_subsidy}}'
        );

        // drops foreign key for table `{{%contragent}}`
        $this->dropForeignKey(
            '{{%fk-project_subsidy-contragent_id}}',
            '{{%project_subsidy}}'
        );

        // drops index for column `contragent_id`
        $this->dropIndex(
            '{{%idx-project_subsidy-contragent_id}}',
            '{{%project_subsidy}}'
        );

        // drops foreign key for table `{{%regions}}`
        $this->dropForeignKey(
            '{{%fk-project_subsidy-region_id}}',
            '{{%project_subsidy}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-project_subsidy-region_id}}',
            '{{%project_subsidy}}'
        );

        // drops foreign key for table `{{%regions}}`
        $this->dropForeignKey(
            '{{%fk-project_subsidy-district_id}}',
            '{{%project_subsidy}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-project_subsidy-district_id}}',
            '{{%project_subsidy}}'
        );

        // drops foreign key for table `{{%plant_schema}}`
        $this->dropForeignKey(
            '{{%fk-project_subsidy-plant_schema_id}}',
            '{{%project_subsidy}}'
        );

        // drops index for column `plant_schema_id`
        $this->dropIndex(
            '{{%idx-project_subsidy-plant_schema_id}}',
            '{{%project_subsidy}}'
        );

        // drops foreign key for table `{{%references}}`
        $this->dropForeignKey(
            '{{%fk-project_subsidy-project_all_price_currency_id}}',
            '{{%project_subsidy}}'
        );

        // drops index for column `project_all_price_currency_id`
        $this->dropIndex(
            '{{%idx-project_subsidy-project_all_price_currency_id}}',
            '{{%project_subsidy}}'
        );

        $this->dropTable('{{%project_subsidy}}');
    }
}
