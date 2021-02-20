<?php

use yii\db\Migration;

/**
 * Class m210204_112316_insert_appeal_status_table
 */
class m210204_112316_insert_appeal_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('appeal_status',
            ['id', 'name_uz', 'name_ru', 'name_en'] ,
            [
                [1, "Янги", "Новый", "New"],
                [2, "Агентликка жўнатилди", "Отправлено в агентство", "Sent to the agency"],
                [3, "Агентлик қабул қилди", "Агентство приняло", "The agency accepted"],
                [4, "Агентлик аризани қайтарди", "Агентство вернуло заявку", "The agency returned the application"],
                [5, "Кенгашга ўтказилди", "Передано в Совет", "Referred to the Council"],
                [6, "Кенгаш рад этди", "Совет отказался", "Council refused"],
                [7, "Кенгаш қабул қилди", "Совет принял", "Council accepted"],
                [8, "Субсидия ажратилди", "Субсидия была выделена", "The subsidy was allocated"],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('appeal_status', [
            'id' => [1, 2, 3, 4, 5, 6, 7, 8]
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210204_112316_insert_appeal_status_table cannot be reverted.\n";

        return false;
    }
    */
}
