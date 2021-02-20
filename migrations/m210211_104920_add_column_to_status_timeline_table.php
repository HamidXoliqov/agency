<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%status_timeline}}`.
 */
class m210211_104920_add_column_to_status_timeline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%status_timeline}}', 'status_by', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%status_timeline}}', 'status_by');
    }
}
