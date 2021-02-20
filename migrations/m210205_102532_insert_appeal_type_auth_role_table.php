<?php

use yii\db\Migration;

/**
 * Class m210205_102532_insert_appeal_type_auth_role_table
 */
class m210205_102532_insert_appeal_type_auth_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('auth_item', ['name' => 'appeal-type', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal-type/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal-type/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal-type/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal-type/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal-type/view', 'type' => '2', 'description' => '']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete("auth_item", [
            'name' => [
                'appeal-type',
                'appeal-type/index',
                'appeal-type/delete',
                'appeal-type/update',
                'appeal-type/create',
                'appeal-type/view',
            ]
        ]);
    }


}
