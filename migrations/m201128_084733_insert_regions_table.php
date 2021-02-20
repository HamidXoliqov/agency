<?php

use yii\db\Migration;

/**
 * Class m201105_174442_insert_regions_table
 */
class m201128_084733_insert_regions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete("{{%regions}}");
        $this->insert('regions', [ 'id' => 1, 'parent_id' => null, 'name_uz' => 'Qoraqalpog‘iston Respublikasi', 'name_ru' => 'Республика Каракалпакстан', 'name_en' => 'The Republic of Karakalpakstan', 'status' => 1]);
        $this->insert('regions', [ 'id' => 2, 'parent_id' => null, 'name_uz' => 'Andijon viloyati', 'name_ru' => 'Андижанская область', 'name_en' => 'Andijan region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 3, 'parent_id' => null, 'name_uz' => 'Buxoro viloyati', 'name_ru' => 'Бухарская область', 'name_en' => 'Bukhara region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 4, 'parent_id' => null, 'name_uz' => 'Jizzax viloyati', 'name_ru' => 'Джизакская область', 'name_en' => 'Jizzakh region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 5, 'parent_id' => null, 'name_uz' => 'Qashqadaryo viloyati', 'name_ru' => 'Кашкадарьинская область', 'name_en' => 'Kashkadarya region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 6, 'parent_id' => null, 'name_uz' => 'Navoiy viloyati', 'name_ru' => 'Навоийская область', 'name_en' => 'Navoi region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 7, 'parent_id' => null, 'name_uz' => 'Namangan viloyati', 'name_ru' => 'Наманганская область', 'name_en' => 'Namangan region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 8, 'parent_id' => null, 'name_uz' => 'Samarqand viloyati', 'name_ru' => 'Самаркандская область', 'name_en' => 'Samarkand region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 9, 'parent_id' => null, 'name_uz' => 'Surxandaryo viloyati', 'name_ru' => 'Сурхандарьинская область', 'name_en' => 'Surkhandarya region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 10, 'parent_id' => null, 'name_uz' => 'Sirdaryo viloyati', 'name_ru' => 'Сырдарьинская область', 'name_en' => 'Syrdarya region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 11, 'parent_id' => null, 'name_uz' => 'Toshkent viloyati', 'name_ru' => 'Ташкентская область', 'name_en' => 'Tashkent region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 12, 'parent_id' => null, 'name_uz' => 'Farg‘ona viloyati', 'name_ru' => 'Ферганская область', 'name_en' => 'Fergana region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 13, 'parent_id' => null, 'name_uz' => 'Xorazm viloyati', 'name_ru' => 'Хорезмская область', 'name_en' => 'Khorezm region', 'status' => 1]);
        $this->insert('regions', [ 'id' => 14, 'parent_id' => null, 'name_uz' => 'Toshkent shahri', 'name_ru' => 'Город Ташкент', 'name_en' => 'Tashkent city', 'status' => 1]);



        $this->insert('regions', [ 'id' => 15, 'parent_id' => 1, 'name_uz' => 'Amudaryo tumani', 'name_ru' => 'Амударьинский район', 'name_en' => 'Amudarya district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 16, 'parent_id' => 1, 'name_uz' => 'Beruniy tumani', 'name_ru' => 'Берунийский район', 'name_en' => 'Beruni district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 17, 'parent_id' => 1, 'name_uz' => 'Kegayli tumani', 'name_ru' => 'Кегейлинский район', 'name_en' => 'Kegeyli district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 18, 'parent_id' => 1, 'name_uz' => 'Qonliko‘l tumani', 'name_ru' => 'Канлыкульский район', 'name_en' => 'Kanlikul district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 19, 'parent_id' => 1, 'name_uz' => 'Qorao‘zak tumani', 'name_ru' => 'Караозакский район', 'name_en' => 'Karaozak district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 20, 'parent_id' => 1, 'name_uz' => 'Qo‘ng‘irot tumani', 'name_ru' => 'Кунградский район', 'name_en' => 'Kungrad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 21, 'parent_id' => 1, 'name_uz' => 'Mo‘ynoq tumani', 'name_ru' => 'Мойнакский район', 'name_en' => 'Moynak district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 22, 'parent_id' => 1, 'name_uz' => 'Nukus tumani', 'name_ru' => 'Нукусский район', 'name_en' => 'Nukus district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 23, 'parent_id' => 1, 'name_uz' => 'Nukus shahri', 'name_ru' => 'Город Нукус', 'name_en' => 'Nukus city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 24, 'parent_id' => 1, 'name_uz' => 'Taxtako‘pir tumani', 'name_ru' => 'Тахтакорский район', 'name_en' => 'Takhtakor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 25, 'parent_id' => 1, 'name_uz' => 'To‘rtko‘l tumani', 'name_ru' => 'Турткульский район', 'name_en' => 'Turtkul district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 26, 'parent_id' => 1, 'name_uz' => 'Xo‘jayli tumani', 'name_ru' => 'Ходжайлинский район', 'name_en' => 'Khojayli district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 27, 'parent_id' => 1, 'name_uz' => 'CHimboy tumani', 'name_ru' => 'Чимбойский район', 'name_en' => 'CHimboy district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 28, 'parent_id' => 1, 'name_uz' => 'SHumanay tumani', 'name_ru' => 'Шуманайский район', 'name_en' => 'SHumanay district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 29, 'parent_id' => 1, 'name_uz' => 'Ellikqal‘a tumani', 'name_ru' => 'Элликкалинский район', 'name_en' => 'Ellikkala district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 30, 'parent_id' => 2, 'name_uz' => 'Andijon shahri', 'name_ru' => 'Андижан', 'name_en' => 'Andijan city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 31, 'parent_id' => 2, 'name_uz' => 'Andijon tumani', 'name_ru' => 'Андижанский район', 'name_en' => 'Andijan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 32, 'parent_id' => 2, 'name_uz' => 'Asaka tumani', 'name_ru' => 'Асакинский район', 'name_en' => 'Asaka district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 33, 'parent_id' => 2, 'name_uz' => 'Baliqchi tumani', 'name_ru' => 'Баликчинский район', 'name_en' => 'Balikchi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 34, 'parent_id' => 2, 'name_uz' => 'Buloqboshi tumani', 'name_ru' => 'Булокбошский район', 'name_en' => 'Buloqboshi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 35, 'parent_id' => 2, 'name_uz' => 'Bo‘z tumani', 'name_ru' => 'Бозский район', 'name_en' => 'Boz district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 36, 'parent_id' => 2, 'name_uz' => 'Jalaquduq tumani', 'name_ru' => 'Джалал-Абадский район', 'name_en' => 'Jalaquduq district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 37, 'parent_id' => 2, 'name_uz' => 'Izbosgan tumani', 'name_ru' => 'Избосганский район', 'name_en' => 'Izbosgan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 38, 'parent_id' => 2, 'name_uz' => 'Qorasuv shahri', 'name_ru' => 'Город Карасув', 'name_en' => 'The city of Karasuv', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 39, 'parent_id' => 2, 'name_uz' => 'Qo‘rg‘ontepa tumani', 'name_ru' => 'Курган-Тюбский район', 'name_en' => 'Qurghonteppa district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 40, 'parent_id' => 2, 'name_uz' => 'Marhamat tumani', 'name_ru' => 'Мархаматский район', 'name_en' => 'Marhamat district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 41, 'parent_id' => 2, 'name_uz' => 'Oltinko‘l tumani', 'name_ru' => 'Алтынкольский район', 'name_en' => 'Altynkol district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 42, 'parent_id' => 2, 'name_uz' => 'Paxtaobod tumani', 'name_ru' => 'Пахтаабадский район', 'name_en' => 'Pakhtaobod district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 43, 'parent_id' => 2, 'name_uz' => 'Ulug‘nor tumani', 'name_ru' => 'Улугнорский район', 'name_en' => 'Ulugnor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 44, 'parent_id' => 2, 'name_uz' => 'Xonabod tumani', 'name_ru' => 'Ханабадский район', 'name_en' => 'Khanabad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 45, 'parent_id' => 2, 'name_uz' => 'Xo‘jaobod shahri', 'name_ru' => 'Ходжаабад', 'name_en' => 'Khojaabad city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 46, 'parent_id' => 2, 'name_uz' => 'Shaxrixon tumani', 'name_ru' => 'Шахриханский район', 'name_en' => 'Shahrihan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 47, 'parent_id' => 3, 'name_uz' => 'Buxoro shahri', 'name_ru' => 'Бухара', 'name_en' => 'Bukhara city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 48, 'parent_id' => 3, 'name_uz' => 'Buxoro tumani', 'name_ru' => 'Бухарский район', 'name_en' => 'Bukhara district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 49, 'parent_id' => 3, 'name_uz' => 'Vobkent tumani', 'name_ru' => 'Вобкентский район', 'name_en' => 'Vobkent district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 50, 'parent_id' => 3, 'name_uz' => 'G‘ijduvon tumani', 'name_ru' => 'Гиждуванский район', 'name_en' => 'Gijduvan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 51, 'parent_id' => 3, 'name_uz' => 'Jondor tumani', 'name_ru' => 'Жондорский район', 'name_en' => 'Jondor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 52, 'parent_id' => 3, 'name_uz' => 'Kogon tumani', 'name_ru' => 'Когонский район', 'name_en' => 'Kogon district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 53, 'parent_id' => 3, 'name_uz' => 'Kogon shahri', 'name_ru' => 'Город Каган', 'name_en' => 'The city of Kagan', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 54, 'parent_id' => 3, 'name_uz' => 'Qorako‘l tumani', 'name_ru' => 'Каракольский район', 'name_en' => 'Karakol district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 55, 'parent_id' => 3, 'name_uz' => 'Qorovulbozor tumani', 'name_ru' => 'Каравулбозорский район', 'name_en' => 'Karavulbozor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 56, 'parent_id' => 3, 'name_uz' => 'Olot tumani', 'name_ru' => 'Олотский район', 'name_en' => 'Olot district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 57, 'parent_id' => 3, 'name_uz' => 'Peshku tumani', 'name_ru' => 'Пешкунский район', 'name_en' => 'Peshku district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 58, 'parent_id' => 3, 'name_uz' => 'Romitan tumani', 'name_ru' => 'Ромитанский район', 'name_en' => 'Romitan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 59, 'parent_id' => 3, 'name_uz' => 'Shofirkon tumani', 'name_ru' => 'Шофирконский район', 'name_en' => 'Shofirkon district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 60, 'parent_id' => 4, 'name_uz' => 'Arnasoy tumani', 'name_ru' => 'Арнасайский район', 'name_en' => 'Arnasay district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 61, 'parent_id' => 4, 'name_uz' => 'Baxmal tumani', 'name_ru' => 'Бахмальский район', 'name_en' => 'Bakhmal district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 62, 'parent_id' => 4, 'name_uz' => 'G‘allaorol tumani', 'name_ru' => 'Галлаоролский район', 'name_en' => 'Gallaorol district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 63, 'parent_id' => 4, 'name_uz' => 'Do‘stlik tumani', 'name_ru' => 'Район Дружбы', 'name_en' => 'Friendship District', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 64, 'parent_id' => 4, 'name_uz' => 'Sh.Rashidov tumani', 'name_ru' => 'Ш.Рашидовский район', 'name_en' => 'Sh.Rashidov district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 65, 'parent_id' => 4, 'name_uz' => 'Jizzax shahri', 'name_ru' => 'Город Джизак', 'name_en' => 'Jizzakh city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 66, 'parent_id' => 4, 'name_uz' => 'Zarbdor tumani', 'name_ru' => 'Зарбдорский район', 'name_en' => 'Zarbdor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 67, 'parent_id' => 4, 'name_uz' => 'Zafarobod tumani', 'name_ru' => 'Зафарободский район', 'name_en' => 'Zafarobod district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 68, 'parent_id' => 4, 'name_uz' => 'Zomin tumani', 'name_ru' => 'Зоминский район', 'name_en' => 'Zomin district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 69, 'parent_id' => 4, 'name_uz' => 'Mirzacho‘l tumani', 'name_ru' => 'Мирзачульский район', 'name_en' => 'Mirzachul district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 70, 'parent_id' => 4, 'name_uz' => 'Paxtakor tumani', 'name_ru' => 'Пахтакорский район', 'name_en' => 'Pakhtakor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 71, 'parent_id' => 4, 'name_uz' => 'Forish tumani', 'name_ru' => 'Форишский район', 'name_en' => 'Forish district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 72, 'parent_id' => 4, 'name_uz' => 'Yangiobod tumani', 'name_ru' => 'Янгиабадский район', 'name_en' => 'Yangiabad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 73, 'parent_id' => 5, 'name_uz' => 'G‘uzor tumani', 'name_ru' => 'Гузарский район', 'name_en' => 'Guzar district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 74, 'parent_id' => 5, 'name_uz' => 'Dehqonobod tumani', 'name_ru' => 'Дехканабадский район', 'name_en' => 'Dehkanabad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 75, 'parent_id' => 5, 'name_uz' => 'Qamashi tumani', 'name_ru' => 'Камашинский район', 'name_en' => 'Kamashi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 76, 'parent_id' => 5, 'name_uz' => 'Qarshi tumani', 'name_ru' => 'Каршинский район', 'name_en' => 'Karshi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 77, 'parent_id' => 5, 'name_uz' => 'Qarshi shahri', 'name_ru' => 'Карши', 'name_en' => 'Karshi city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 78, 'parent_id' => 5, 'name_uz' => 'Kasbi tumani', 'name_ru' => 'Касбинский район', 'name_en' => 'Kasbi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 79, 'parent_id' => 5, 'name_uz' => 'Kitob tumani', 'name_ru' => 'Книжный район', 'name_en' => 'Book District', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 80, 'parent_id' => 5, 'name_uz' => 'Koson tumani', 'name_ru' => 'Косонский район', 'name_en' => 'Koson district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 81, 'parent_id' => 5, 'name_uz' => 'Mirishkor tumani', 'name_ru' => 'Миришкорский район', 'name_en' => 'Mirishkor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 82, 'parent_id' => 5, 'name_uz' => 'Muborak tumani', 'name_ru' => 'Муборакский район', 'name_en' => 'Muborak district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 83, 'parent_id' => 5, 'name_uz' => 'Nishon tumani', 'name_ru' => 'Целевой район', 'name_en' => 'Target district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 84, 'parent_id' => 5, 'name_uz' => 'Chiroqchi tumani', 'name_ru' => 'Чиракчинский район', 'name_en' => 'Chirakchi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 85, 'parent_id' => 5, 'name_uz' => 'Shahrisabz tumani', 'name_ru' => 'Шахрисабзский район', 'name_en' => 'Shahrisabz district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 86, 'parent_id' => 5, 'name_uz' => 'Yakkabog‘ tumani', 'name_ru' => 'Яккабогский район', 'name_en' => 'Yakkabog district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 87, 'parent_id' => 6, 'name_uz' => 'Zarafshon shahri', 'name_ru' => 'Город Зарафшан', 'name_en' => 'Zarafshan city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 88, 'parent_id' => 6, 'name_uz' => 'Karmana tumani', 'name_ru' => 'Карманинский район', 'name_en' => 'Karmana district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 89, 'parent_id' => 6, 'name_uz' => 'Qiziltepa tumani', 'name_ru' => 'Кызылтепинский район', 'name_en' => 'Kyzyltepa district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 90, 'parent_id' => 6, 'name_uz' => 'Konimex tumani', 'name_ru' => 'Конимекс район', 'name_en' => 'Konimex district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 91, 'parent_id' => 6, 'name_uz' => 'Navbahor tumani', 'name_ru' => 'Навбахорский район', 'name_en' => 'Navbahor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 92, 'parent_id' => 6, 'name_uz' => 'Navoiy shahri', 'name_ru' => 'Город Навои', 'name_en' => 'Navoi city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 93, 'parent_id' => 6, 'name_uz' => 'Nurota tumani', 'name_ru' => 'Нуротский район', 'name_en' => 'Nurota district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 94, 'parent_id' => 6, 'name_uz' => 'Tomdi tumani', 'name_ru' => 'Томдинский район', 'name_en' => 'Tomdi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 95, 'parent_id' => 6, 'name_uz' => 'Uchquduq tumani', 'name_ru' => 'Учкудукский район', 'name_en' => 'Uchkuduk district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 96, 'parent_id' => 6, 'name_uz' => 'Xatirchi tumani', 'name_ru' => 'Хатырчинский район', 'name_en' => 'Khatirchi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 97, 'parent_id' => 7, 'name_uz' => 'Kosonsoy tumani', 'name_ru' => 'Косонсойский район', 'name_en' => 'Kosonsoy district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 98, 'parent_id' => 7, 'name_uz' => 'Mingbuloq tumani', 'name_ru' => 'Мингбулакский район', 'name_en' => 'Mingbulak district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 99, 'parent_id' => 7, 'name_uz' => 'Namangan tumani', 'name_ru' => 'Наманганский район', 'name_en' => 'Namangan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 100, 'parent_id' => 7, 'name_uz' => 'Namangan shahri', 'name_ru' => 'Наманган', 'name_en' => 'Namangan city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 101, 'parent_id' => 7, 'name_uz' => 'Norin tumani', 'name_ru' => 'Норинский район', 'name_en' => 'Norin district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 102, 'parent_id' => 7, 'name_uz' => 'Pop tumani', 'name_ru' => 'Поп район', 'name_en' => 'Pop district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 103, 'parent_id' => 7, 'name_uz' => 'To‘raqo‘rg‘on tumani', 'name_ru' => 'Туракурганский район', 'name_en' => 'Turakurgan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 104, 'parent_id' => 7, 'name_uz' => 'Uychi tumani', 'name_ru' => 'Уйчинский район', 'name_en' => 'Uychi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 105, 'parent_id' => 7, 'name_uz' => 'Uchqo‘rg‘on tumani', 'name_ru' => 'Учкурганский район', 'name_en' => 'Uchkurgan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 106, 'parent_id' => 7, 'name_uz' => 'Chortoq tumani', 'name_ru' => 'Чартакский район', 'name_en' => 'Chartak district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 107, 'parent_id' => 7, 'name_uz' => 'Chust tumani', 'name_ru' => 'Чустский район', 'name_en' => 'Chust district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 108, 'parent_id' => 7, 'name_uz' => 'Yangiqo‘rg‘on tumani', 'name_ru' => 'Янгикурганский район', 'name_en' => 'Yangikurgan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 109, 'parent_id' => 8, 'name_uz' => 'Bulung‘ur tumani', 'name_ru' => 'Булунгурский район', 'name_en' => 'Bulungur district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 110, 'parent_id' => 8, 'name_uz' => 'Jomboy tumani', 'name_ru' => 'Джомбойский район', 'name_en' => 'Jomboy district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 111, 'parent_id' => 8, 'name_uz' => 'Ishtixon tumani', 'name_ru' => 'Иштихонский район', 'name_en' => 'Ishtikhon district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 112, 'parent_id' => 8, 'name_uz' => 'Kattaqo‘rg‘on tumani', 'name_ru' => 'Каттакурганский район', 'name_en' => 'Kattakurgan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 113, 'parent_id' => 8, 'name_uz' => 'Kattaqo‘rg‘on shahri', 'name_ru' => 'Каттакурган', 'name_en' => 'Kattakurgan city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 114, 'parent_id' => 8, 'name_uz' => 'Qo‘shrabot tumani', 'name_ru' => 'Кошрабатский район', 'name_en' => 'Koshrabat district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 115, 'parent_id' => 8, 'name_uz' => 'Narpay tumani', 'name_ru' => 'Нарпайский район', 'name_en' => 'Narpay district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 116, 'parent_id' => 8, 'name_uz' => 'Nurabod tumani', 'name_ru' => 'Нурабадский район', 'name_en' => 'Nurabod district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 117, 'parent_id' => 8, 'name_uz' => 'Oqdaryo tumani', 'name_ru' => 'Акдарьинский район', 'name_en' => 'Aqdaryo district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 118, 'parent_id' => 8, 'name_uz' => 'Payariq tumani', 'name_ru' => 'Паярикский район', 'name_en' => 'Payariq district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 119, 'parent_id' => 8, 'name_uz' => 'Pastarg‘om tumani', 'name_ru' => 'Пастаргомский район', 'name_en' => 'Pastargom district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 120, 'parent_id' => 8, 'name_uz' => 'Paxtachi tumani', 'name_ru' => 'Пахтачинский район', 'name_en' => 'Pakhtachi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 121, 'parent_id' => 8, 'name_uz' => 'Samarqand tumani', 'name_ru' => 'Самаркандский район', 'name_en' => 'Samarkand district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 122, 'parent_id' => 8, 'name_uz' => 'Samarqand shahri', 'name_ru' => 'Самарканд', 'name_en' => 'Samarkand city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 123, 'parent_id' => 8, 'name_uz' => 'Toyloq tumani', 'name_ru' => 'Тайлакский район', 'name_en' => 'Taylaq district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 124, 'parent_id' => 8, 'name_uz' => 'Urgut tumani', 'name_ru' => 'Ургутский район', 'name_en' => 'Urgut district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 125, 'parent_id' => 9, 'name_uz' => 'Angor tumani', 'name_ru' => 'Ангорский район', 'name_en' => 'Angor district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 126, 'parent_id' => 9, 'name_uz' => 'Boysun tumani', 'name_ru' => 'Байсунский район', 'name_en' => 'Boysun district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 127, 'parent_id' => 9, 'name_uz' => 'Denov tumani', 'name_ru' => 'Деновский район', 'name_en' => 'Denov district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 128, 'parent_id' => 9, 'name_uz' => 'Jarqo‘rg‘on tumani', 'name_ru' => 'Джаркурганский район', 'name_en' => 'Jarqurghon district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 129, 'parent_id' => 9, 'name_uz' => 'Qiziriq tumani', 'name_ru' => 'Гызырикский район', 'name_en' => 'Qizirik district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 130, 'parent_id' => 9, 'name_uz' => 'Qo‘mqo‘rg‘on tumani', 'name_ru' => 'Кумкурганский район', 'name_en' => 'Kumkurgan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 131, 'parent_id' => 9, 'name_uz' => 'Muzrabot tumani', 'name_ru' => 'Музработский район', 'name_en' => 'Muzrabot district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 132, 'parent_id' => 9, 'name_uz' => 'Oltinsoy tumani', 'name_ru' => 'Олтинсойский район', 'name_en' => 'Oltinsoy district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 133, 'parent_id' => 9, 'name_uz' => 'Sariosiy tumani', 'name_ru' => 'Сариосийский район', 'name_en' => 'Sariosiy district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 134, 'parent_id' => 9, 'name_uz' => 'Termiz tumani', 'name_ru' => 'Термезский район', 'name_en' => 'Termez district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 135, 'parent_id' => 9, 'name_uz' => 'Termiz shahri', 'name_ru' => 'Город Термез', 'name_en' => 'Termez city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 136, 'parent_id' => 9, 'name_uz' => 'Uzun tumani', 'name_ru' => 'Длинный район', 'name_en' => 'Long district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 137, 'parent_id' => 9, 'name_uz' => 'Sherobod tumani', 'name_ru' => 'Шерабадский район', 'name_en' => 'Sherabad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 138, 'parent_id' => 9, 'name_uz' => 'Sho‘rchi tumani', 'name_ru' => 'Шурчинский район', 'name_en' => 'Shurchi district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 139, 'parent_id' => 10, 'name_uz' => 'Boyovut tumani', 'name_ru' => 'Боевутский район', 'name_en' => 'Boyovut district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 140, 'parent_id' => 10, 'name_uz' => 'Guliston tumani', 'name_ru' => 'Гулистанский район', 'name_en' => 'Gulistan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 141, 'parent_id' => 10, 'name_uz' => 'Guliston shahri', 'name_ru' => 'Город Гулистан', 'name_en' => 'Gulistan city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 142, 'parent_id' => 10, 'name_uz' => 'Mirzaobod tumani', 'name_ru' => 'Мирзаабадский район', 'name_en' => 'Mirzaobod district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 143, 'parent_id' => 10, 'name_uz' => 'Oqoltin tumani', 'name_ru' => 'Околтинский район', 'name_en' => 'Oqoltin district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 144, 'parent_id' => 10, 'name_uz' => 'Sayxunobod tumani', 'name_ru' => 'Сайхюнабадский район', 'name_en' => 'Sayxunabad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 145, 'parent_id' => 10, 'name_uz' => 'Sardoba tumani', 'name_ru' => 'Сардобинский район', 'name_en' => 'Sardoba district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 146, 'parent_id' => 10, 'name_uz' => 'Sirdaryo tumani', 'name_ru' => 'Сырдарьинский район', 'name_en' => 'Syrdarya district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 147, 'parent_id' => 10, 'name_uz' => 'Xavos tumani', 'name_ru' => 'Район Хавос', 'name_en' => 'Havos district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 148, 'parent_id' => 10, 'name_uz' => 'Shirin shahri', 'name_ru' => 'Сладкий город', 'name_en' => 'Sweet city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 149, 'parent_id' => 10, 'name_uz' => 'Yangier shahri', 'name_ru' => 'Город Янгиер', 'name_en' => 'Yangier city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 150, 'parent_id' => 11, 'name_uz' => 'Angiren shahri', 'name_ru' => 'Город Ангирен', 'name_en' => 'Angiren city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 151, 'parent_id' => 11, 'name_uz' => 'Bekabod tumani', 'name_ru' => 'Бекабадский район', 'name_en' => 'Bekabod district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 152, 'parent_id' => 11, 'name_uz' => 'Bekabod shahri', 'name_ru' => 'Г. Бекабад', 'name_en' => 'Bekabad city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 153, 'parent_id' => 11, 'name_uz' => 'Bo‘ka tumani', 'name_ru' => 'Бокинский район', 'name_en' => 'Boka district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 154, 'parent_id' => 11, 'name_uz' => 'Bo‘stonliq tumani', 'name_ru' => 'Бостанлыкский район', 'name_en' => 'Bostanliq district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 155, 'parent_id' => 11, 'name_uz' => 'Zangiota tumani', 'name_ru' => 'Зангиотинский район', 'name_en' => 'Zangiota district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 156, 'parent_id' => 11, 'name_uz' => 'Qibray tumani', 'name_ru' => 'Кибрайский район', 'name_en' => 'Qibray district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 157, 'parent_id' => 11, 'name_uz' => 'Quyichirchiq tumani', 'name_ru' => 'Куйичирчикский район', 'name_en' => 'Quyichirchik district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 158, 'parent_id' => 11, 'name_uz' => 'Oqqo‘rg‘on tumani', 'name_ru' => 'Аккурганский район', 'name_en' => 'Akkurgan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 159, 'parent_id' => 11, 'name_uz' => 'Olmaliq shahri', 'name_ru' => 'Город Алмалык', 'name_en' => 'Almalyk city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 160, 'parent_id' => 11, 'name_uz' => 'Ohangaron tumani', 'name_ru' => 'Ахангаронский район', 'name_en' => 'Ahangaron district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 161, 'parent_id' => 11, 'name_uz' => 'Parkent tumani', 'name_ru' => 'Паркентский район', 'name_en' => 'Parkent district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 162, 'parent_id' => 11, 'name_uz' => 'Piskent tumani', 'name_ru' => 'Пискентский район', 'name_en' => 'Piskent district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 163, 'parent_id' => 11, 'name_uz' => 'O‘rtachirchiq tumani', 'name_ru' => 'Ортачирчикский район', 'name_en' => 'Ortachirchik district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 164, 'parent_id' => 11, 'name_uz' => 'Chinoz tumani', 'name_ru' => 'Чинозский район', 'name_en' => 'Chinoz district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 165, 'parent_id' => 11, 'name_uz' => 'Chirchiq shahri', 'name_ru' => 'Город Чирчик', 'name_en' => 'Chirchik city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 166, 'parent_id' => 11, 'name_uz' => 'Yuqorichirchiq tumani', 'name_ru' => 'Юкоричирчикский район', 'name_en' => 'Yukorichirchik district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 167, 'parent_id' => 11, 'name_uz' => 'Yangiyo‘l tumani', 'name_ru' => 'Янгиюльский район', 'name_en' => 'Yangiyul district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 168, 'parent_id' => 12, 'name_uz' => 'Beshariq tumani', 'name_ru' => 'Бешарикский район', 'name_en' => 'Besharik district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 169, 'parent_id' => 12, 'name_uz' => 'Bog‘dod tumani', 'name_ru' => 'Багдадский район', 'name_en' => 'Baghdad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 170, 'parent_id' => 12, 'name_uz' => 'Buvayda tumani', 'name_ru' => 'Бувайдинский район', 'name_en' => 'Buvayda district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 171, 'parent_id' => 12, 'name_uz' => 'Dang‘ara tumani', 'name_ru' => 'Дангаринский район', 'name_en' => 'Dangara district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 172, 'parent_id' => 12, 'name_uz' => 'Yozyovon tumani', 'name_ru' => 'Язёванский район', 'name_en' => 'Yazyovan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 173, 'parent_id' => 12, 'name_uz' => 'Quva tumani', 'name_ru' => 'Кувинский район', 'name_en' => 'Quva district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 174, 'parent_id' => 12, 'name_uz' => 'Quvasoy shahri', 'name_ru' => 'Город Кувасой', 'name_en' => 'Quvasoy city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 175, 'parent_id' => 12, 'name_uz' => 'Qo‘qon shahri', 'name_ru' => 'Коканд', 'name_en' => 'Kokand city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 176, 'parent_id' => 12, 'name_uz' => 'Qo‘shtepa tumani', 'name_ru' => 'Коштепинский район', 'name_en' => 'Qoshtepa district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 177, 'parent_id' => 12, 'name_uz' => 'Marg‘ilon shahri', 'name_ru' => 'Маргилан', 'name_en' => 'Margilan city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 178, 'parent_id' => 12, 'name_uz' => 'Oltiariq tumani', 'name_ru' => 'Алтыарыкский район', 'name_en' => 'Altiariq district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 179, 'parent_id' => 12, 'name_uz' => 'Rishton tumani', 'name_ru' => 'Риштанский район', 'name_en' => 'Rishtan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 180, 'parent_id' => 12, 'name_uz' => 'So‘x tumani', 'name_ru' => 'Сохский район', 'name_en' => 'Sokh district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 181, 'parent_id' => 12, 'name_uz' => 'Toshloq tumani', 'name_ru' => 'Тошлокский район', 'name_en' => 'Toshloq district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 182, 'parent_id' => 12, 'name_uz' => 'Uchko‘prik tumani', 'name_ru' => 'Учкуприкский район', 'name_en' => 'Uchkuprik district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 183, 'parent_id' => 12, 'name_uz' => 'O‘zbekiston tumani', 'name_ru' => 'Район Узбекистана', 'name_en' => 'District of Uzbekistan', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 184, 'parent_id' => 12, 'name_uz' => 'Farg‘ona tumani', 'name_ru' => 'Ферганский район', 'name_en' => 'Fergana district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 185, 'parent_id' => 12, 'name_uz' => 'Farg‘ona shahri', 'name_ru' => 'Город Фергана', 'name_en' => 'Fergana city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 186, 'parent_id' => 12, 'name_uz' => 'Furqat tumani', 'name_ru' => 'Фуркатский район', 'name_en' => 'Furqat district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 187, 'parent_id' => 13, 'name_uz' => 'Bog‘ot tumani', 'name_ru' => 'Багатский район', 'name_en' => 'Bagat district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 188, 'parent_id' => 13, 'name_uz' => 'Gurlan tumani', 'name_ru' => 'Гурланский район', 'name_en' => 'Gurlan district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 189, 'parent_id' => 13, 'name_uz' => 'Qo‘shko‘pir tumani', 'name_ru' => 'Кошкопирский район', 'name_en' => 'Koshkopir district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 190, 'parent_id' => 13, 'name_uz' => 'Urganch tumani', 'name_ru' => 'Ургенчский район', 'name_en' => 'Urgench district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 191, 'parent_id' => 13, 'name_uz' => 'Urganch shahri', 'name_ru' => 'Город Ургенч', 'name_en' => 'Urgench city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 192, 'parent_id' => 13, 'name_uz' => 'Xiva tumani', 'name_ru' => 'Хивинский район', 'name_en' => 'Khiva district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 193, 'parent_id' => 13, 'name_uz' => 'Xazarasp tumani', 'name_ru' => 'Хазараспский район', 'name_en' => 'Khazarasp district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 194, 'parent_id' => 13, 'name_uz' => 'Xonqa tumani', 'name_ru' => 'Хонкинский район', 'name_en' => 'Xonqa district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 195, 'parent_id' => 13, 'name_uz' => 'Shavot tumani', 'name_ru' => 'Шавотский район', 'name_en' => 'Shavot district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 196, 'parent_id' => 13, 'name_uz' => 'Yangiariq tumani', 'name_ru' => 'Янгиарыкский район', 'name_en' => 'Yangiariq district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 197, 'parent_id' => 13, 'name_uz' => 'Yangibozor tumani', 'name_ru' => 'Янгибазарский район', 'name_en' => 'Yangibazar district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 198, 'parent_id' => 14, 'name_uz' => 'Bektimer tumani', 'name_ru' => 'Бектимерский район', 'name_en' => 'Bektimer district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 199, 'parent_id' => 14, 'name_uz' => 'M.Ulug‘bek tumani', 'name_ru' => 'М.Улугбекский район', 'name_en' => 'M.Ulugbek district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 200, 'parent_id' => 14, 'name_uz' => 'Mirobod tumani', 'name_ru' => 'Мирабадский район', 'name_en' => 'Mirabad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 201, 'parent_id' => 14, 'name_uz' => 'Olmazor tumani', 'name_ru' => 'Алмазарский район', 'name_en' => 'Almazar district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 202, 'parent_id' => 14, 'name_uz' => 'Sergeli tumani', 'name_ru' => 'Сергелийский район', 'name_en' => 'Sergeli district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 203, 'parent_id' => 14, 'name_uz' => 'Uchtepa tumani', 'name_ru' => 'Учтепинский район', 'name_en' => 'Uchtepa district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 204, 'parent_id' => 14, 'name_uz' => 'Yashnobod tumani', 'name_ru' => 'Яшнабадский район', 'name_en' => 'Yashnabad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 205, 'parent_id' => 14, 'name_uz' => 'Chilonzor tumani', 'name_ru' => 'Чиланзарский район', 'name_en' => 'Chilanzar district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 206, 'parent_id' => 14, 'name_uz' => 'Shayxontohur tumani', 'name_ru' => 'Шайхантахурский район', 'name_en' => 'Shayhantahur district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 207, 'parent_id' => 14, 'name_uz' => 'Yunusobod tumani', 'name_ru' => 'Юнусабадский район', 'name_en' => 'Yunusabad district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 208, 'parent_id' => 14, 'name_uz' => 'Yakkasaroy tumani', 'name_ru' => 'Яккасарайский район', 'name_en' => 'Yakkasaray district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 209, 'parent_id' => 1, 'name_uz' => 'Taxiatosh shahri', 'name_ru' => 'Город Тахиаташ', 'name_en' => 'Takhiatash city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 210, 'parent_id' => 2, 'name_uz' => 'Asaka shahri', 'name_ru' => 'Город Асака', 'name_en' => 'Asaka city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 211, 'parent_id' => 9, 'name_uz' => 'Bandixon tumani', 'name_ru' => 'Бандиксонский район', 'name_en' => 'Bandixon district', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 212, 'parent_id' => 11, 'name_uz' => 'Ohangaron shahri', 'name_ru' => 'Город Ахангарон', 'name_en' => 'Ahangaron city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 213, 'parent_id' => 11, 'name_uz' => 'Yangiyo‘l shahri', 'name_ru' => 'Янгиюль', 'name_en' => 'Yangiyul city', 'status' => 1 ]);
        $this->insert('regions', [ 'id' => 215, 'parent_id' => 11, 'name_uz' => 'Toshkent tumani', 'name_ru' => 'Ташкентский район', 'name_en' => 'Tashkent district', 'status' => 1 ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete("{{%regions}}");
    }

}