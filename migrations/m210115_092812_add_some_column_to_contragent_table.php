<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contragent}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department}}`
 */
class m210115_092812_add_some_column_to_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contragent}}', 'department_id', $this->integer());

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-contragent-department_id}}',
            '{{%contragent}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-contragent-department_id}}',
            '{{%contragent}}',
            'department_id',
            '{{%department}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-contragent-department_id}}',
            '{{%contragent}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-contragent-department_id}}',
            '{{%contragent}}'
        );

        $this->dropColumn('{{%contragent}}', 'department_id');
    }
}
