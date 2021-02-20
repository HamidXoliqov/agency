<?php

use app\models\BaseModel;
use yii\db\Migration;

/**
 * Class m201127_054515_alter_bank_column_project_table
 */
class m201127_054515_alter_bank_column_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('{{%references_type}}', [
            'name_uz' => "BANK",
            'name_ru' => "BANK",
            'name_en' => "BANK",
        ]);
        $this->dropForeignKey(
            '{{%fk-project-lending_bank_id}}',
            '{{%project}}'
        );
        $this->dropIndex(
            '{{%idx-project-lending_bank_id}}',
            '{{%project}}'
        );
        $this->createIndex(
            '{{%idx-project-lending_bank_id}}',
            '{{%project}}',
            'lending_bank_id'
        );
        $this->addForeignKey(
            '{{%fk-project-lending_bank_id}}',
            '{{%project}}',
            'lending_bank_id',
            '{{%bank}}',
            'id',
            'CASCADE'
        );
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

}
