<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%contragent}}`.
 */
class m210122_115704_drop_distance_column_from_contragent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%contragent}}', 'distance');
        $this->dropColumn('{{%contragent}}', 'contact_info');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%contragent}}', 'distance', $this->string());
    }
}
