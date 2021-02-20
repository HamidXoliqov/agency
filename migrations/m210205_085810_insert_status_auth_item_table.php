<?php

use yii\db\Migration;

/**
 * Class m210205_085810_insert_status_auth_item_table
 */
class m210205_085810_insert_status_auth_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('auth_item', ['name' => 'contragent-status', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-status/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-status/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-status/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-status/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-status/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'contragent-timeline', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-timeline/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-timeline/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-timeline/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-timeline/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-timeline/view', 'type' => '2', 'description' => '']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete("auth_item", [
            'name' => [
                'contragent-status',
                'contragent-status/index',
                'contragent-status/delete',
                'contragent-status/update',
                'contragent-status/create',
                'contragent-status/view',

                'contragent-timeline',
                'contragent-timeline/index',
                'contragent-timeline/delete',
                'contragent-timeline/update',
                'contragent-timeline/create',
                'contragent-timeline/view',

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
