<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%org_classification}}`.
 */
class m210127_091429_create_org_classification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%org_classification}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'name_uz' => $this->string(),
            'name_ru' => $this->string(),
            'name_en' => $this->string(),
            'stat_code' => $this->string(),
            'tax_code' => $this->string(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-org_classification-parent_id}}',
            '{{%org_classification}}',
            'parent_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-org_classification-parent_id}}',
            '{{%org_classification}}',
            'parent_id',
            '{{%org_classification}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // drops foreign key for table `{{%org_classification}}`
        $this->dropForeignKey(
            '{{%fk-org_classification-parent_id}}',
            '{{%org_classification}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-org_classification-parent_id}}',
            '{{%org_classification}}'
        );

        $this->dropTable('{{%org_classification}}');
    }
}
