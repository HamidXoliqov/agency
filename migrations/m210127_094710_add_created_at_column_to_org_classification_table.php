<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%org_classification}}`.
 */
class m210127_094710_add_created_at_column_to_org_classification_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->addColumn('{{%org_classification}}', 'created_at', $this->integer());
        $this->addColumn('{{%org_classification}}', 'updated_at', $this->integer());
        $this->addColumn('{{%org_classification}}', 'created_by', $this->integer());
        $this->addColumn('{{%org_classification}}', 'updated_by', $this->integer());
        $this->addColumn('{{%org_classification}}', 'status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%org_classification}}', 'created_at');
        $this->dropColumn('{{%org_classification}}', 'updated_at');
        $this->dropColumn('{{%org_classification}}', 'created_by');
        $this->dropColumn('{{%org_classification}}', 'updated_by');
        $this->dropColumn('{{%org_classification}}', 'status');
    }
}
