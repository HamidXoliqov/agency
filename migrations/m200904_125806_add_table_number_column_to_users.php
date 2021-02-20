<?php

use yii\db\Migration;

/**
 * Class m200904_125806_add_table_number_column_to_users
 */
class m200904_125806_add_table_number_column_to_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'table_number', $this->string()->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'table_number');
    }

}
