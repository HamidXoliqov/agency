<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contragent}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%references}}`
 */
class m200708_173928_create_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contragent}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'short_name' => $this->string(50),
            'add_info' => $this->string(),
            'references_type_id' => $this->integer()->notNull(),
            'address' => $this->string(),
            'director' => $this->string(),
            'tel' => $this->string(50),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `references_type_id`
        $this->createIndex(
            '{{%idx-contragent-references_type_id}}',
            '{{%contragent}}',
            'references_type_id'
        );

        // add foreign key for table `{{%references}}`
        $this->addForeignKey(
            '{{%fk-contragent-references_type_id}}',
            '{{%contragent}}',
            'references_type_id',
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
        // drops foreign key for table `{{%references}}`
        $this->dropForeignKey(
            '{{%fk-contragent-references_type_id}}',
            '{{%contragent}}'
        );

        // drops index for column `references_type_id`
        $this->dropIndex(
            '{{%idx-contragent-references_type_id}}',
            '{{%contragent}}'
        );

        $this->dropTable('{{%contragent}}');
    }
}
