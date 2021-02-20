<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%item}}`.
 */
class m200708_150900_add_stock_limit_column_to_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%item}}', 'stock_limit', $this->decimal(20,3));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%item}}', 'stock_limit');
    }
}
