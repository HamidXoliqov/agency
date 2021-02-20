<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%appeal}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%contragent}}`
 */
class m210204_063409_create_appeal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%appeal}}', [
            'id' => $this->primaryKey(),
            'contragent_id' => $this->integer()->notNull(),
            'appeal_status' => $this->integer()->notNull(),
            'appeal_type' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `contragent_id`
        $this->createIndex(
            '{{%idx-appeal-contragent_id}}',
            '{{%appeal}}',
            'contragent_id'
        );

        // add foreign key for table `{{%contragent}}`
        $this->addForeignKey(
            '{{%fk-appeal-contragent_id}}',
            '{{%appeal}}',
            'contragent_id',
            '{{%contragent}}',
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
            '{{%fk-appeal-contragent_id}}',
            '{{%appeal}}'
        );

        // drops index for column `contragent_id`
        $this->dropIndex(
            '{{%idx-appeal-contragent_id}}',
            '{{%appeal}}'
        );

        $this->dropTable('{{%appeal}}');
    }
}
