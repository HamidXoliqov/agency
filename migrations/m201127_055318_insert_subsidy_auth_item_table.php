<?php

use yii\db\Migration;

/**
 * Class m200711_161523_insert_auth_item_table
 */
class m201127_055318_insert_subsidy_auth_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
// subsidy
        $this->insert('auth_item', ['name' => 'appeal', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'appeal/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'plant-schema', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'plant-schema/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'plant-schema/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'plant-schema/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'plant-schema/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'plant-schema/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'nav-type', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'nav-type/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'nav-type/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'nav-type/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'nav-type/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'nav-type/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'project-subsidy', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy/view', 'type' => '2', 'description' => '']);

        $this->insert('auth_item', ['name' => 'project-subsidy-work', 'type' => '3', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy-work/index', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy-work/delete', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy-work/update', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy-work/create', 'type' => '2', 'description' => '']);
        $this->insert('auth_item', ['name' => 'project-subsidy-work/view', 'type' => '2', 'description' => '']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete("auth_assignment", [
            'item_name' => 'appeal', 'user_id' => '1',
        ]);
        $this->delete("auth_item", [
            'name' => [
                'appeal',
                'appeal/index',
                'appeal/delete',
                'appeal/update',
                'appeal/create',
                'appeal/view',

                'plant-schema',
                'plant-schema/index',
                'plant-schema/delete',
                'plant-schema/update',
                'plant-schema/create',
                'plant-schema/view',

                'nav-type',
                'nav-type/index',
                'nav-type/delete',
                'nav-type/update',
                'nav-type/create',
                'nav-type/view',

                'project-subsidy',
                'project-subsidy/index',
                'project-subsidy/delete',
                'project-subsidy/update',
                'project-subsidy/create',
                'project-subsidy/view',

                'project-subsidy-work',
                'project-subsidy-work/index',
                'project-subsidy-work/delete',
                'project-subsidy-work/update',
                'project-subsidy-work/create',
                'project-subsidy-work/view',
            ]
        ]);
    }

}
