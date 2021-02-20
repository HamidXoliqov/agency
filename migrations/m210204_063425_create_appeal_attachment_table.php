<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%appeal_attachment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%appeal}}`
 * - `{{%attachment}}`
 */
class m210204_063425_create_appeal_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%appeal_attachment}}', [
            'id' => $this->primaryKey(),
            'appeal_id' => $this->integer()->notNull(),
            'attachment_id' => $this->integer(),
            'type' => $this->integer()->notNull(),
        ]);

        // creates index for column `appeal_id`
        $this->createIndex(
            '{{%idx-appeal_attachment-appeal_id}}',
            '{{%appeal_attachment}}',
            'appeal_id'
        );

        // add foreign key for table `{{%appeal}}`
        $this->addForeignKey(
            '{{%fk-appeal_attachment-appeal_id}}',
            '{{%appeal_attachment}}',
            'appeal_id',
            '{{%appeal}}',
            'id',
            'CASCADE'
        );

        // creates index for column `attachment_id`
        $this->createIndex(
            '{{%idx-appeal_attachment-attachment_id}}',
            '{{%appeal_attachment}}',
            'attachment_id'
        );

        // add foreign key for table `{{%attachment}}`
        $this->addForeignKey(
            '{{%fk-appeal_attachment-attachment_id}}',
            '{{%appeal_attachment}}',
            'attachment_id',
            '{{%attachment}}',
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
            '{{%fk-appeal_attachment-appeal_id}}',
            '{{%appeal_attachment}}'
        );

        // drops index for column `appeal_id`
        $this->dropIndex(
            '{{%idx-appeal_attachment-appeal_id}}',
            '{{%appeal_attachment}}'
        );

        // drops foreign key for table `{{%attachment}}`
        $this->dropForeignKey(
            '{{%fk-appeal_attachment-attachment_id}}',
            '{{%appeal_attachment}}'
        );

        // drops index for column `attachment_id`
        $this->dropIndex(
            '{{%idx-appeal_attachment-attachment_id}}',
            '{{%appeal_attachment}}'
        );

        $this->dropTable('{{%appeal_attachment}}');
    }
}
