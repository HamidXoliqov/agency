<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%status_timeline}}`.
 */
class m210215_064954_drop_user_id_column_from_status_timeline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%status_timeline}}', 'user_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%status_timeline}}', 'user_id', $this->integer());
    }
}
