<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%column_to_contragent}}`.
 */
class m210115_112825_drop_column_to_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
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

        $this->dropColumn('{{%contragent}}', 'references_type_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       return true;
    }
}
