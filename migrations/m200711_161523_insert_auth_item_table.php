<?php

use yii\db\Migration;

/**
 * Class m200711_161523_insert_auth_item_table
 */
class m200711_161523_insert_auth_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insert('auth_item', ['name' => 'auth-assignment', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-assignment/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-assignment/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-assignment/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-assignment/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-assignment/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'auth-item', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item/update', 'type' => '2', 'description' => '']);


        $this->insert('auth_item', ['name' => 'auth-item-child', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item-child/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item-child/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item-child/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item-child/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'auth-item-child/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'users', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'users/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'users/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'users/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'users/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'users/delete', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'item', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item/update', 'type' => '2', 'description' => '']);


        $this->insert('auth_item', ['name' => 'item-category', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-category/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-category/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-category/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-category/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-category/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'license', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'license/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'license/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'license/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'license/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'license/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'regions', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'regions/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'regions/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'regions/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'regions/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'regions/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'bank', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'bank/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'bank/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'bank/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'bank/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'bank/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'contragent', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'contragent-type', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-type/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-type/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-type/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-type/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'contragent-type/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'countries', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'countries/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'countries/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'countries/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'countries/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'countries/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'department', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'document/incoming', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/incoming/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/incoming/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/incoming/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/incoming/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/incoming/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'document/moving', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/moving/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/moving/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/moving/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/moving/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/moving/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'document/outgoing', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/outgoing/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/outgoing/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/outgoing/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/outgoing/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'document/outgoing/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'department-area', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department-area/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department-area/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department-area/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department-area/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'department-area/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'references', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references/update', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'references-type', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references-type/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references-type/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references-type/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references-type/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'references-type/view', 'type' => '2', 'description' => '']);


        $this->insert('auth_item', ['name' => 'user-department', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'user-department/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'user-department/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'user-department/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'user-department/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'user-department/view', 'type' => '2', 'description' => '']);


        $this->insert('auth_item', ['name' => 'exchange-rate', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'exchange-rate/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'exchange-rate/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'exchange-rate/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'exchange-rate/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'exchange-rate/view', 'type' => '2', 'description' => '']);


        $this->insert('auth_item', ['name' => 'item-balance', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-balance/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-balance/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-balance/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-balance/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'item-balance/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'recipe', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'recipe/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'recipe/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'recipe/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'recipe/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'recipe/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'production', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'production/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'production/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'production/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'production/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'production/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'transaction', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'transaction/update-expenses', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'transaction/create-expenses', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'transaction/delete-expenses', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'transaction/index-expenses', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'transaction/view-expenses', 'type' => '2', 'description' => '']);

        // roles
        $this->insert('auth_item', ['name' => 'admin', 'type' => '1', 'description' => '']);
        $this->insert('auth_item', ['name' => 'user', 'type' => '1', 'description' => '']);
        $this->insert('auth_item', ['name' => 'super-admin', 'type' => '1', 'description' => '']);

        // Auth-item-child inserts
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-assignment/index']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-assignment/delete']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-assignment/update']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-assignment/create']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-assignment/view']);

        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item/index']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item/create']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item/delete']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item/view']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item/update']);

        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item-child/index']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item-child/delete']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item-child/view']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item-child/update']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'auth-item-child/create']);

        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'users/index']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'users/delete']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'users/view']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'users/update']);
        $this->insert('auth_item_child', ['parent' => 'super-admin', 'child' => 'users/create']);

        $this->insert('auth_assignment', ['item_name' => 'super-admin', 'user_id' => '1']);

        $this->insert('users', ['fullname' => 'admin', 'username' => 'admin', 'password' => '$2y$13$MAPvmkf1T/ZBT5SRbLW2TOBgFjQYAGU6Qfjw1KXb43VgA9NmeNARW', 'email' => 'admin@mail.com', 'status' => '1', 'address' => 'none']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete("users");
        $this->delete("auth_assignment");
        $this->delete("auth_item");
        $this->delete("auth_item_child");
    }

}
