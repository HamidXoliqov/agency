<?php

use yii\db\Migration;

/**
 * Class m200711_161523_insert_auth_item_table
 */
class m201127_055318_insert_permissions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insert('auth_item', ['name' => 'project', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item_child', ['parent' => 'project', 'child' => 'project/index']);
        $this->insert('auth_item_child', ['parent' => 'project', 'child' => 'project/delete']);
        $this->insert('auth_item_child', ['parent' => 'project', 'child' => 'project/update']);
        $this->insert('auth_item_child', ['parent' => 'project', 'child' => 'project/create']);
        $this->insert('auth_item_child', ['parent' => 'project', 'child' => 'project/view']);


        $this->insert('auth_item', ['name' => 'project-2-point', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-2-point/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-2-point/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-2-point/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-2-point/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-2-point/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item_child', ['parent' => 'project-2-point', 'child' => 'project-2-point/index']);
        $this->insert('auth_item_child', ['parent' => 'project-2-point', 'child' => 'project-2-point/delete']);
        $this->insert('auth_item_child', ['parent' => 'project-2-point', 'child' => 'project-2-point/update']);
        $this->insert('auth_item_child', ['parent' => 'project-2-point', 'child' => 'project-2-point/create']);
        $this->insert('auth_item_child', ['parent' => 'project-2-point', 'child' => 'project-2-point/view']);


        $this->insert('auth_item', ['name' => 'project-3-point', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-3-point/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-3-point/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-3-point/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-3-point/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-3-point/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item_child', ['parent' => 'project-3-point', 'child' => 'project-3-point/index']);
        $this->insert('auth_item_child', ['parent' => 'project-3-point', 'child' => 'project-3-point/delete']);
        $this->insert('auth_item_child', ['parent' => 'project-3-point', 'child' => 'project-3-point/update']);
        $this->insert('auth_item_child', ['parent' => 'project-3-point', 'child' => 'project-3-point/create']);
        $this->insert('auth_item_child', ['parent' => 'project-3-point', 'child' => 'project-3-point/view']);


        $this->insert('auth_item', ['name' => 'project-8-11-point', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-8-11-point/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-8-11-point/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-8-11-point/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-8-11-point/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-8-11-point/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item_child', ['parent' => 'project-8-11-point', 'child' => 'project-8-11-point/index']);
        $this->insert('auth_item_child', ['parent' => 'project-8-11-point', 'child' => 'project-8-11-point/delete']);
        $this->insert('auth_item_child', ['parent' => 'project-8-11-point', 'child' => 'project-8-11-point/update']);
        $this->insert('auth_item_child', ['parent' => 'project-8-11-point', 'child' => 'project-8-11-point/create']);
        $this->insert('auth_item_child', ['parent' => 'project-8-11-point', 'child' => 'project-8-11-point/view']);


        $this->insert('auth_item', ['name' => 'project-13-21-point', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-13-21-point/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-13-21-point/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-13-21-point/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-13-21-point/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-13-21-point/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item_child', ['parent' => 'project-13-21-point', 'child' => 'project-13-21-point/index']);
        $this->insert('auth_item_child', ['parent' => 'project-13-21-point', 'child' => 'project-13-21-point/delete']);
        $this->insert('auth_item_child', ['parent' => 'project-13-21-point', 'child' => 'project-13-21-point/update']);
        $this->insert('auth_item_child', ['parent' => 'project-13-21-point', 'child' => 'project-13-21-point/create']);
        $this->insert('auth_item_child', ['parent' => 'project-13-21-point', 'child' => 'project-13-21-point/view']);


        $this->insert('auth_item', ['name' => 'project-22-26-point', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-22-26-point/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-22-26-point/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-22-26-point/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-22-26-point/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-22-26-point/view', 'type' => '2', 'description' => '']);
        $this->insert('auth_item_child', ['parent' => 'project-22-26-point', 'child' => 'project-22-26-point/index']);
        $this->insert('auth_item_child', ['parent' => 'project-22-26-point', 'child' => 'project-22-26-point/delete']);
        $this->insert('auth_item_child', ['parent' => 'project-22-26-point', 'child' => 'project-22-26-point/update']);
        $this->insert('auth_item_child', ['parent' => 'project-22-26-point', 'child' => 'project-22-26-point/create']);
        $this->insert('auth_item_child', ['parent' => 'project-22-26-point', 'child' => 'project-22-26-point/view']);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete("auth_assignment", [
            'item_name' => 'project', 'user_id' => '1',
        ]);
        $this->delete("auth_item", [
            'name' => [
                'project',
                'project/index',
                'project/delete',
                'project/update',
                'project/create',
                'project/view',

                'project-2-point',
                'project-2-point/index',
                'project-2-point/delete',
                'project-2-point/update',
                'project-2-point/create',
                'project-2-point/view',

                'project-3-point',
                'project-3-point/index',
                'project-3-point/delete',
                'project-3-point/update',
                'project-3-point/create',
                'project-3-point/view',

                'project-8-11-point',
                'project-8-11-point/index',
                'project-8-11-point/delete',
                'project-8-11-point/update',
                'project-8-11-point/create',
                'project-8-11-point/view',

                'project-13-21-point',
                'project-13-21-point/index',
                'project-13-21-point/delete',
                'project-13-21-point/update',
                'project-13-21-point/create',
                'project-13-21-point/view',

                'project-22-26-point',
                'project-22-26-point/index',
                'project-22-26-point/delete',
                'project-22-26-point/update',
                'project-22-26-point/create',
                'project-22-26-point/view',
            ]
        ]);
    }

}
