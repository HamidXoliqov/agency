<?php

use yii\db\Migration;

/**
 * Class m210202_135007_insert_mysoliq_region_table
 */
class m210202_135007_insert_mysoliq_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%mysoliq_region}}',
            [
                'code',
                'name_ru',
                'name_uz',
 
            ],
            [
                [3,   'АНДИЖАНСКАЯ', 'Андижон вилояти'],
                [6,   'БУХАРСКАЯ',   'Бухоро вилояти'],
                [8,   'ДЖИЗАКСКАЯ',  'Жиззах вилояти'],
                [10,  'КАШКАДАРЬИНСКАЯ', 'Қашқадарё вилояти'],
                [12,  'НАВОИЙСКАЯ',  'Навоий вилояти'],
                [14,  'НАМАНГАНСКАЯ',    'Наманган вилояти'],
                [18,  'САМАРКАНДСКАЯ',   'Самарқанд вилояти'],
                [22,  'СУРХАНДАРЬИНСКАЯ',    'Сурхондарё вилояти'],
                [24,  'СЫРДАРЬИНСКАЯ',   'Сирдарё вилояти'],
                [26,  'г.ТАШКЕНТ',   'Тошкент шаҳар'],
                [27,  'ТАШКЕНТСКАЯ', 'Тошкент вилояти'],
                [30,  'ФЕРГАНСКАЯ',  'Фарғона вилояти'],
                [33,  'ХОРЕЗМСКАЯ',  'Хоразм вилояти'],
                [35,  'РЕСП.КАРАКАЛПАКСТАН', 'Қорақалпоғистон Респ.'],
                [50,  'МРИ', 'Ҳудудлараро инспекцияси']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%mysoliq_region}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210202_135007_insert_mysoliq_region_table cannot be reverted.\n";

        return false;
    }
    */
}
