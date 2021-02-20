<?php

use app\models\BaseModel;
use yii\db\Migration;

/**
 * Class m201126_174326_add_some_data_and_columns_table
 */
class m201126_174326_add_some_data_and_columns_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("{{%project}}", "lending_bank_id", $this->integer()->comment("41"));
        $this->createIndex(
            '{{%idx-project-lending_bank_id}}',
            '{{%project}}',
            'lending_bank_id'
        );
        $this->addForeignKey(
            '{{%fk-project-lending_bank_id}}',
            '{{%project}}',
            'lending_bank_id',
            '{{%references}}',
            'id',
            'CASCADE'
        );
        $this->insert('{{%references_type}}', [
            'name_uz' => "BANK",
            'name_ru' => "BANK",
            'name_en' => "BANK",
            'status' => BaseModel::STATUS_ACTIVE
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-project-lending_bank_id}}',
            '{{%project}}'
        );
        $this->dropIndex(
            '{{%idx-project-lending_bank_id}}',
            '{{%project}}'
        );
        $this->dropColumn("{{%project}}", "lending_bank_id");

        $this->delete('{{%references_type}}', [
            'name_uz' => "BANK",
            'name_ru' => "BANK",
            'name_en' => "BANK",
        ]);

    }

}
