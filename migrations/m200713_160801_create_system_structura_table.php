<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%system_structura}}`.
 */
class m200713_160801_create_system_structura_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%system_structura}}', [
            'id' => $this->primaryKey(),
            'img_login' => $this->string(),
            'img_header' => $this->string(),
            'title' => $this->string(),
            'content' => $this->string(),
        ]);

        $this->insert('system_structura', ['img_login' => 'logo-letter-3.png', 'img_header' => 'logo-header.png', 'title' => 'Sign In To Admin', 'content' => 'Enter your details to login to your account:']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%system_structura}}');
    }
}
