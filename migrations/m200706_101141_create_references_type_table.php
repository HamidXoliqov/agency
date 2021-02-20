<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type}}`.
 */
class m200706_101141_create_references_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%references_type}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(50),
            'name_ru' => $this->string(50),
            'name_en' => $this->string(50),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        $this->insert('references_type', ['name_uz' => 'CURRENCY', 'name_ru' => 'CURRENCY', 'name_en' => 'CURRENCY', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'DEPARTMENT_TYPE', 'name_ru' => 'DEPARTMENT_TYPE', 'name_en' => 'DEPARTMENT_TYPE', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'ACCOUNT_TYPE', 'name_ru' => 'ACCOUNT_TYPE', 'name_en' => 'ACCOUNT_TYPE', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'COLOR', 'name_ru' => 'COLOR', 'name_en' => 'COLOR', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'GENDER', 'name_ru' => 'GENDER', 'name_en' => 'GENDER', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'SIZE', 'name_ru' => 'SIZE', 'name_en' => 'SIZE', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'AVTOTRANSPORT_TURI', 'name_ru' => 'ТИП_АВТОТРАНСПОРТ', 'name_en' => 'AUTO_TRANSPORT_TYPE', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'BRAND', 'name_ru' => 'BRAND', 'name_en' => 'BRAND', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'UNIT', 'name_ru' => 'UNIT', 'name_en' => 'UNIT', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'TARA TURI', 'name_ru' => 'TARA TURI', 'name_en' => 'TARA TURI', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'CONTRAGENT_TYPE', 'name_ru' => 'CONTRAGENT_TYPE', 'name_en' => 'CONTRAGENT_TYPE', 'status' => '1',]);
        $this->insert('references_type', ['name_uz' => 'EXPENSES_CATEGORY', 'name_ru' => 'EXPENSES_CATEGORY', 'name_en' => 'EXPENSES_CATEGORY', 'status' => '1',]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%references_type}}');
    }
}
