<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%references}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%references_type}}`
 */
class m200706_193939_create_references_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%references}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(50),
            'name_ru' => $this->string(50),
            'name_en' => $this->string(50),
            'token' => $this->string(50),
            'sort' => $this->integer(),
            'references_type_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `type_id`
        $this->createIndex(
            '{{%idx-references-references_type_id}}',
            '{{%references}}',
            'references_type_id'
        );

        // add foreign key for table `{{%type}}`
        $this->addForeignKey(
            '{{%fk-references-references_type_id}}',
            '{{%references}}',
            'references_type_id',
            '{{%references_type}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%type}}`
        $this->dropForeignKey(
            '{{%fk-references-references_type_id}}',
            '{{%references}}'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            '{{%idx-references-references_type_id}}',
            '{{%references}}'
        );

        $this->dropTable('{{%references}}');
    }
}
