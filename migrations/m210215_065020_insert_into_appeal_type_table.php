<?php

use yii\db\Migration;

/**
 * Class m210215_065020_insert_into_appeal_type_table
 */
class m210215_065020_insert_into_appeal_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%appeal_type}}', [
            'id' => 1,
            'name_uz' => 'Субсидия',
            'name_ru' => 'Субсидия',
            'name_en' => 'Subsidy'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%appeal_type}}', ['id' => 1]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210215_065020_insert_into_appeal_type_table cannot be reverted.\n";

        return false;
    }
    */
}
