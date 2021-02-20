<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status_timeline}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%appeal}}`
 * - `{{%users}}`
 */
class m210204_112258_create_status_timeline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status_timeline}}', [
            'id' => $this->primaryKey(),
            'appeal_id' => $this->integer(),
            'action_time' => $this->integer()->notNull(),
            'comment' => $this->text(),
            'status' => $this->integer()->notNull(),
            'user_id' => $this->integer(),
            'type' => $this->integer()->notNull(),
        ]);

        // creates index for column `appeal_id`
        $this->createIndex(
            '{{%idx-status_timeline-appeal_id}}',
            '{{%status_timeline}}',
            'appeal_id'
        );

        // add foreign key for table `{{%appeal}}`
        $this->addForeignKey(
            '{{%fk-status_timeline-appeal_id}}',
            '{{%status_timeline}}',
            'appeal_id',
            '{{%appeal}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-status_timeline-user_id}}',
            '{{%status_timeline}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-status_timeline-user_id}}',
            '{{%status_timeline}}',
            'user_id',
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
        // drops foreign key for table `{{%appeal}}`
        $this->dropForeignKey(
            '{{%fk-status_timeline-appeal_id}}',
            '{{%status_timeline}}'
        );

        // drops index for column `appeal_id`
        $this->dropIndex(
            '{{%idx-status_timeline-appeal_id}}',
            '{{%status_timeline}}'
        );

        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-status_timeline-user_id}}',
            '{{%status_timeline}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-status_timeline-user_id}}',
            '{{%status_timeline}}'
        );

        $this->dropTable('{{%status_timeline}}');
    }
}
