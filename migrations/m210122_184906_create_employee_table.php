<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m210122_184906_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'tin' => $this->integer(),
            'ns10Code' => $this->integer(),
            'ns10Name' => $this->string(),
            'ns11Code' => $this->integer(),
            'ns11Name' => $this->string(),
            'fullName' => $this->string(),
            'birthDate' => $this->date(),
            'sex' => $this->integer(),
            'sexName' => $this->string(),
            'passSeries' => $this->string(),
            'passNumber' => $this->integer(),
            'passDate' => $this->date(),
            'passOrg' => $this->string(),
            'phone' => $this->bigInteger(),
            'zipCode' => $this->integer(),
            'address' => $this->string(),
            'ns13Code' => $this->integer(),
            'ns13Name' => $this->string(),
            'tinDate' => $this->date(),
            'dateModify' => $this->date(),
            'isitd' => $this->integer(),
            'duty' => $this->boolean(),
            'personalNum' => $this->bigInteger(),
            'docCode' => $this->integer(),
            'docName' => $this->string(),
            'isNotary' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
