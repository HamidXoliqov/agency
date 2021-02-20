<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%column_to_departmen}}`.
 */
class m210116_042247_drop_column_to_departmen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // drops foreign key for table `{{%directory}}`
        $this->dropForeignKey(
            '{{%fk-department-department_type_id}}',
            '{{%department}}'
        );

        // drops index for column `department_type_id`
        $this->dropIndex(
            '{{%idx-department-department_type_id}}',
            '{{%department}}'
        );

        $this->dropColumn('{{%department}}', 'department_type_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
