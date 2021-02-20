<?php

use yii\db\Migration;

/**
 * Class m210204_112248_insert_auth_item
 */
class m210204_112248_insert_auth_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('auth_item', ['name' => 'contragent/status', 'type' => '2', 'description' => '']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('auth_item', ['name' => 'contragent/status']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210204_112248_insert_auth_item cannot be reverted.\n";

        return false;
    }
    */
}
