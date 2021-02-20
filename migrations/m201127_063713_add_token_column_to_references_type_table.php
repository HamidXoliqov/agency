<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%references_type}}`.
 */
class m201127_063713_add_token_column_to_references_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('references_type','token',$this->string(50));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('references_type','token');
    }
}
