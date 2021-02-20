<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contragent_org_classification}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%contragent}}`
 * - `{{%org_classification}}`
 */
class m210129_115453_create_contragent_org_classification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contragent_org_classification}}', [
            'id' => $this->primaryKey(),
            'contragent_id' => $this->integer(),
            'org_classification_id' => $this->integer(),
        ]);

        // creates index for column `contragent_id`
        $this->createIndex(
            '{{%idx-contragent_org_classification-contragent_id}}',
            '{{%contragent_org_classification}}',
            'contragent_id'
        );

        // add foreign key for table `{{%contragent}}`
        $this->addForeignKey(
            '{{%fk-contragent_org_classification-contragent_id}}',
            '{{%contragent_org_classification}}',
            'contragent_id',
            '{{%contragent}}',
            'id',
            'CASCADE'
        );

        // creates index for column `org_classification_id`
        $this->createIndex(
            '{{%idx-contragent_org_classification-org_classification_id}}',
            '{{%contragent_org_classification}}',
            'org_classification_id'
        );

        // add foreign key for table `{{%org_classification}}`
        $this->addForeignKey(
            '{{%fk-contragent_org_classification-org_classification_id}}',
            '{{%contragent_org_classification}}',
            'org_classification_id',
            '{{%org_classification}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%contragent}}`
        $this->dropForeignKey(
            '{{%fk-contragent_org_classification-contragent_id}}',
            '{{%contragent_org_classification}}'
        );

        // drops index for column `contragent_id`
        $this->dropIndex(
            '{{%idx-contragent_org_classification-contragent_id}}',
            '{{%contragent_org_classification}}'
        );

        // drops foreign key for table `{{%org_classification}}`
        $this->dropForeignKey(
            '{{%fk-contragent_org_classification-org_classification_id}}',
            '{{%contragent_org_classification}}'
        );

        // drops index for column `org_classification_id`
        $this->dropIndex(
            '{{%idx-contragent_org_classification-org_classification_id}}',
            '{{%contragent_org_classification}}'
        );

        $this->dropTable('{{%contragent_org_classification}}');
    }
}
