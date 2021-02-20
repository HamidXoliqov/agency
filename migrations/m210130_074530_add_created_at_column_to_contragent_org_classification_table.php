<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contragent_org_classification}}`.
 */
class m210130_074530_add_created_at_column_to_contragent_org_classification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contragent_org_classification}}', 'created_at', $this->integer());
        $this->addColumn('{{%contragent_org_classification}}', 'updated_at', $this->integer());
        $this->addColumn('{{%contragent_org_classification}}', 'created_by', $this->integer());
        $this->addColumn('{{%contragent_org_classification}}', 'updated_by', $this->integer());
        $this->addColumn('{{%contragent_org_classification}}', 'status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contragent_org_classification}}', 'created_at');
        $this->dropColumn('{{%contragent_org_classification}}', 'updated_at');
        $this->dropColumn('{{%contragent_org_classification}}', 'created_by');
        $this->dropColumn('{{%contragent_org_classification}}', 'updated_by');
        $this->dropColumn('{{%contragent_org_classification}}', 'status');
    }
}
