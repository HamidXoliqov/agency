<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_article}}`.
 */
class m200812_102133_create_item_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE SEQUENCE item_article start 1 increment 1");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP SEQUENCE item_article");
    }
}
