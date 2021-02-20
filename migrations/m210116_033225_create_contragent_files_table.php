<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contragent_files}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%contragent}}`
 */
class m210116_033225_create_contragent_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contragent_files}}', [
            'id' => $this->primaryKey(),
            'contragent_id' => $this->integer(),
            'filename' => $this->string(100),
        ]);

        // creates index for column `contragent_id`
        $this->createIndex(
            '{{%idx-contragent_files-contragent_id}}',
            '{{%contragent_files}}',
            'contragent_id'
        );

        // add foreign key for table `{{%contragent}}`
        $this->addForeignKey(
            '{{%fk-contragent_files-contragent_id}}',
            '{{%contragent_files}}',
            'contragent_id',
            '{{%contragent}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%contragent}}`
        $this->dropForeignKey(
            '{{%fk-contragent_files-contragent_id}}',
            '{{%contragent_files}}'
        );

        // drops index for column `contragent_id`
        $this->dropIndex(
            '{{%idx-contragent_files-contragent_id}}',
            '{{%contragent_files}}'
        );

        $this->dropTable('{{%contragent_files}}');
    }
}
