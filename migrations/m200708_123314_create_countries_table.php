<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%countries}}`.
 */
class m200708_123314_create_countries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%countries}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'name_en' => $this->string(),
            'name_ru' => $this->string(),
            'name_uz' => $this->string(),
            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Afg\'oniston', 'name_ru' =>'Афганистан', 'name_en' =>'Afghanistan', 'code' =>'AFG', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Aland orollari', 'name_ru' =>'Аландские острова', 'name_en' =>'Aland Islands', 'code' =>'ALA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Albaniya', 'name_ru' =>'Албания', 'name_en' =>'Albania', 'code' =>'ALB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Jazoir', 'name_ru' =>'Алжир', 'name_en' =>'Algeria', 'code' =>'DZA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Amerika Samoasi', 'name_ru' =>'Американское Самоа', 'name_en' =>'American Samoa', 'code' =>'ASM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Andorra', 'name_ru' =>'Андорра', 'name_en' =>'Andorra', 'code' =>'AND', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Angola', 'name_ru' =>'Ангола', 'name_en' =>'Angola', 'code' =>'AGO', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Anguilla', 'name_ru' =>'Ангилья', 'name_en' =>'Anguilla', 'code' =>'AIA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Antarktida', 'name_ru' =>'Антарктида', 'name_en' =>'Antarctica', 'code' =>'ATA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Antigua va Barbuda', 'name_ru' =>'Антигуа и Барбуда', 'name_en' =>'Antigua and Barbuda', 'code' =>'ATG', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Argentina', 'name_ru' =>'Аргентина', 'name_en' =>'Argentina', 'code' =>'ARG', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Armaniston', 'name_ru' =>'Армения', 'name_en' =>'Armenia', 'code' =>'ARM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Aruba', 'name_ru' =>'Аруба', 'name_en' =>'Aruba', 'code' =>'ABW', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Avstraliya', 'name_ru' =>'Австралия', 'name_en' =>'Australia', 'code' =>'AUS', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Avstriya', 'name_ru' =>'Австрия', 'name_en' =>'Austria', 'code' =>'AUT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ozarbayjon', 'name_ru' =>'Азербайджан', 'name_en' =>'Azerbaijan', 'code' =>'AZE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bagam orollari', 'name_ru' =>'Багамы', 'name_en' =>'Bahamas', 'code' =>'BHS', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bahrayn', 'name_ru' =>'Бахрейн', 'name_en' =>'Bahrain', 'code' =>'BHR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bangladesh', 'name_ru' =>'Бангладеш', 'name_en' =>'Bangladesh', 'code' =>'BGD', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Barbados', 'name_ru' =>'Барбадос', 'name_en' =>'Barbados', 'code' =>'BRB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Belarus', 'name_ru' =>'Беларусь', 'name_en' =>'Belarus', 'code' =>'BLR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Belgiya', 'name_ru' =>'Бельгия', 'name_en' =>'Belgium', 'code' =>'BEL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Beliz', 'name_ru' =>'Белиз', 'name_en' =>'Belize', 'code' =>'BLZ', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Benin', 'name_ru' =>'Бенин', 'name_en' =>'Benin', 'code' =>'BEN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bermuda', 'name_ru' =>'Бермуды', 'name_en' =>'Bermuda', 'code' =>'BMU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Butan', 'name_ru' =>'Бутан', 'name_en' =>'Bhutan', 'code' =>'BTN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Boliviya', 'name_ru' =>'Боливия', 'name_en' =>'Bolivia', 'code' =>'BOL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bonaire, Sint Evstatius va Saba', 'name_ru' =>'Бонэйр, Синт-Эстатиус и Саба', 'name_en' =>'Bonaire, Sint Eustatius and Saba', 'code' =>'BES', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bosniya va Gertsegovina', 'name_ru' =>'Босния и Герцеговина', 'name_en' =>'Bosnia and Herzegovina', 'code' =>'BIH', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Botsvana', 'name_ru' =>'Ботсвана', 'name_en' =>'Botswana', 'code' =>'BWA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bouvet Island', 'name_ru' =>'Остров Буве', 'name_en' =>'Bouvet Island', 'code' =>'BVT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Braziliya', 'name_ru' =>'Бразилия', 'name_en' =>'Brazil', 'code' =>'BRA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Hind okeanining Britaniya hududi', 'name_ru' =>'Британская территория Индийского океана', 'name_en' =>'British Indian Ocean Territory', 'code' =>'IOT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bruney', 'name_ru' =>'Бруней', 'name_en' =>'Brunei', 'code' =>'BRN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bolgariya', 'name_ru' =>'Болгария', 'name_en' =>'Bulgaria', 'code' =>'BGR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Burkina Faso', 'name_ru' =>'Буркина-Фасо', 'name_en' =>'Burkina Faso', 'code' =>'BFA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Burundi', 'name_ru' =>'Бурунди', 'name_en' =>'Burundi', 'code' =>'BDI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kambodja', 'name_ru' =>'Камбоджа', 'name_en' =>'Cambodia', 'code' =>'KHM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kamerun', 'name_ru' =>'Камерун', 'name_en' =>'Cameroon', 'code' =>'CMR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kanada', 'name_ru' =>'Канада', 'name_en' =>'Canada', 'code' =>'CAN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kabo-Verde', 'name_ru' =>'Кабо-Верде', 'name_en' =>'Cape Verde', 'code' =>'CPV', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kayman orollari', 'name_ru' =>'Каймановы острова', 'name_en' =>'Cayman Islands', 'code' =>'CYM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Markaziy Afrika Respublikasi', 'name_ru' =>'Центрально-Африканская Республика', 'name_en' =>'Central African Republic', 'code' =>'CAF', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Chad', 'name_ru' =>'Чад', 'name_en' =>'Chad', 'code' =>'TCD', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Chili', 'name_ru' =>'Чили', 'name_en' =>'Chile', 'code' =>'CHL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Xitoy', 'name_ru' =>'Китай', 'name_en' =>'China', 'code' =>'CHN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Rojdestvo oroli', 'name_ru' =>'Остров Рождества', 'name_en' =>'Christmas Island', 'code' =>'CXR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kokos (Kiling) orollari', 'name_ru' =>'Кокосовые (Килинг) острова', 'name_en' =>'Cocos (Keeling) Islands', 'code' =>'CCK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kolumbiya', 'name_ru' =>'Колумбия', 'name_en' =>'Colombia', 'code' =>'COL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Komor', 'name_ru' =>'Коморские острова', 'name_en' =>'Comoros', 'code' =>'COM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kongo', 'name_ru' =>'Конго', 'name_en' =>'Congo', 'code' =>'COG', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kuk orollari', 'name_ru' =>'Острова Кука', 'name_en' =>'Cook Islands', 'code' =>'COK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kosta-Rika', 'name_ru' =>'Коста-Рика', 'name_en' =>'Costa Rica', 'code' =>'CRI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Fil Suyagi sohili', 'name_ru' =>'Кот-д\'Ивуар', 'name_en' =>'Ivory Coast', 'code' =>'CIV', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Xorvatiya', 'name_ru' =>'Хорватия', 'name_en' =>'Croatia', 'code' =>'HRV', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kuba', 'name_ru' =>'Куба', 'name_en' =>'Cuba', 'code' =>'CUB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kurakao', 'name_ru' =>'Кюрасао', 'name_en' =>'Curacao', 'code' =>'CUW', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kipr', 'name_ru' =>'Кипр', 'name_en' =>'Cyprus', 'code' =>'CYP', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Chexiya Respublikasi', 'name_ru' =>'Республика Чехия', 'name_en' =>'Czech Republic', 'code' =>'CZE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kongo Demokratik Respublikasi', 'name_ru' =>'Демократическая Республика Конго', 'name_en' =>'Democratic Republic of the Congo', 'code' =>'COD', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Daniya', 'name_ru' =>'Дания', 'name_en' =>'Denmark', 'code' =>'DNK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Djibuti', 'name_ru' =>'Джибути', 'name_en' =>'Djibouti', 'code' =>'DJI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Dominika', 'name_ru' =>'Доминика', 'name_en' =>'Dominica', 'code' =>'DMA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Dominik Respublikasi', 'name_ru' =>'Доминиканская Респблика', 'name_en' =>'Dominican Republic', 'code' =>'DOM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ekvador', 'name_ru' =>'Эквадор', 'name_en' =>'Ecuador', 'code' =>'ECU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Misr', 'name_ru' =>'Египет', 'name_en' =>'Egypt', 'code' =>'EGY', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Salvador', 'name_ru' =>'Сальвадор', 'name_en' =>'El Salvador', 'code' =>'SLV', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ekvatorial Gvineya', 'name_ru' =>'Экваториальная Гвинея', 'name_en' =>'Equatorial Guinea', 'code' =>'GNQ', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Eritreya', 'name_ru' =>'Эритрея', 'name_en' =>'Eritrea', 'code' =>'ERI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Estoniya', 'name_ru' =>'Эстония', 'name_en' =>'Estonia', 'code' =>'EST', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Efiopiya', 'name_ru' =>'Эфиопия', 'name_en' =>'Ethiopia', 'code' =>'ETH', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Folklend orollari (Malvinalar)', 'name_ru' =>'Фолклендские (Мальвинские) острова', 'name_en' =>'Falkland Islands (Malvinas)', 'code' =>'FLK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Farer orollari', 'name_ru' =>'Фарерские острова', 'name_en' =>'Faroe Islands', 'code' =>'FRO', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Fidji', 'name_ru' =>'Фиджи', 'name_en' =>'Fiji', 'code' =>'FJI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Finlyandiya', 'name_ru' =>'Финляндия', 'name_en' =>'Finland', 'code' =>'FIN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Fransiya', 'name_ru' =>'Франция', 'name_en' =>'France', 'code' =>'FRA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Fransuz Gvianasi', 'name_ru' =>'Французская Гвиана', 'name_en' =>'French Guiana', 'code' =>'GUF', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Fransuz Polineziyasi', 'name_ru' =>'Французская Полинезия', 'name_en' =>'French Polynesia', 'code' =>'PYF', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Fransiyaning janubiy hududlari', 'name_ru' =>'Южные Французские Территории', 'name_en' =>'French Southern Territories', 'code' =>'ATF', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gabon', 'name_ru' =>'Габон', 'name_en' =>'Gabon', 'code' =>'GAB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gambiya', 'name_ru' =>'Гамбия', 'name_en' =>'Gambia', 'code' =>'GMB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gruziya', 'name_ru' =>'Грузия', 'name_en' =>'Georgia', 'code' =>'GEO', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Germaniya', 'name_ru' =>'Германия', 'name_en' =>'Germany', 'code' =>'DEU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gana', 'name_ru' =>'Гана', 'name_en' =>'Ghana', 'code' =>'GHA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gibraltar', 'name_ru' =>'Гибралтар', 'name_en' =>'Gibraltar', 'code' =>'GIB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gretsiya', 'name_ru' =>'Греция', 'name_en' =>'Greece', 'code' =>'GRC', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Grenlandiya', 'name_ru' =>'Гренландия', 'name_en' =>'Greenland', 'code' =>'GRL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Grenada', 'name_ru' =>'Гренада', 'name_en' =>'Grenada', 'code' =>'GRD', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gvadalupa', 'name_ru' =>'Гваделуп', 'name_en' =>'Guadaloupe', 'code' =>'GLP', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Guam', 'name_ru' =>'Гуа', 'name_en' =>'Guam', 'code' =>'GUM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gvatemala', 'name_ru' =>'Гватемала', 'name_en' =>'Guatemala', 'code' =>'GTM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gernsi', 'name_ru' =>'Гернси', 'name_en' =>'Guernsey', 'code' =>'GGY', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gvineya', 'name_ru' =>'Гвинея', 'name_en' =>'Guinea', 'code' =>'GIN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gvineya-Bisau', 'name_ru' =>'Гвинея-Бисау', 'name_en' =>'Guinea-Bissau', 'code' =>'GNB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gayana', 'name_ru' =>'Гайана', 'name_en' =>'Guyana', 'code' =>'GUY', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gaiti', 'name_ru' =>'Гаити', 'name_en' =>'Haiti', 'code' =>'HTI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Xard oroli va Makdonald orollari', 'name_ru' =>'Острова Херд и Макдональд', 'name_en' =>'Heard Island and McDonald Islands', 'code' =>'HMD', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gonduras', 'name_ru' =>'Гондурас', 'name_en' =>'Honduras', 'code' =>'HND', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Gonkong', 'name_ru' =>'Гонконг', 'name_en' =>'Hong Kong', 'code' =>'HKG', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Vengriya', 'name_ru' =>'Венгрия', 'name_en' =>'Hungary', 'code' =>'HUN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Islandiya', 'name_ru' =>'Исландия', 'name_en' =>'Iceland', 'code' =>'ISL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Hindiston', 'name_ru' =>'Индия', 'name_en' =>'India', 'code' =>'IND', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Indoneziya', 'name_ru' =>'Индонезия', 'name_en' =>'Indonesia', 'code' =>'IDN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Eron', 'name_ru' =>'Иран', 'name_en' =>'Iran', 'code' =>'IRN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Iroq', 'name_ru' =>'Ирак', 'name_en' =>'Iraq', 'code' =>'IRQ', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Irlandiya', 'name_ru' =>'Ирландия', 'name_en' =>'Ireland', 'code' =>'IRL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Men oroli', 'name_ru' =>'Остров Мэн', 'name_en' =>'Isle of Man', 'code' =>'IMN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Isroil', 'name_ru' =>'Израиль', 'name_en' =>'Israel', 'code' =>'ISR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Italiya', 'name_ru' =>'Италия', 'name_en' =>'Italy', 'code' =>'ITA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Yamayka', 'name_ru' =>'Ямайка', 'name_en' =>'Jamaica', 'code' =>'JAM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Yaponiya', 'name_ru' =>'Япония', 'name_en' =>'Japan', 'code' =>'JPN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Jersi', 'name_ru' =>'Джерси', 'name_en' =>'Jersey', 'code' =>'JEY', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Iordaniya', 'name_ru' =>'Иордания', 'name_en' =>'Jordan', 'code' =>'JOR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Qozogiston', 'name_ru' =>'Казахстан', 'name_en' =>'Kazakhstan', 'code' =>'KAZ', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Keniya', 'name_ru' =>'Кения', 'name_en' =>'Kenya', 'code' =>'KEN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kiribati', 'name_ru' =>'Кирибати', 'name_en' =>'Kiribati', 'code' =>'KIR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kosovo', 'name_ru' =>'Косово', 'name_en' =>'Kosovo', 'code' =>'---', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Quvayt', 'name_ru' =>'Кувейт', 'name_en' =>'Kuwait', 'code' =>'KWT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Qirg\'iziston', 'name_ru' =>'Кыргызстан', 'name_en' =>'Kyrgyzstan', 'code' =>'KGZ', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Laos', 'name_ru' =>'Лаос', 'name_en' =>'Laos', 'code' =>'LAO', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Latviya', 'name_ru' =>'Латвия', 'name_en' =>'Latvia', 'code' =>'LVA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Livan', 'name_ru' =>'Ливан', 'name_en' =>'Lebanon', 'code' =>'LBN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Lesoto', 'name_ru' =>'Лесото', 'name_en' =>'Lesotho', 'code' =>'LSO', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Liberiya', 'name_ru' =>'Либерия', 'name_en' =>'Liberia', 'code' =>'LBR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Liviya', 'name_ru' =>'Ливия', 'name_en' =>'Libya', 'code' =>'LBY', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Lixtenshteyn', 'name_ru' =>'Лихтенштейн', 'name_en' =>'Liechtenstein', 'code' =>'LIE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Litva', 'name_ru' =>'Литва', 'name_en' =>'Lithuania', 'code' =>'LTU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Lyuksemburg', 'name_ru' =>'Люксембург', 'name_en' =>'Luxembourg', 'code' =>'LUX', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Makao', 'name_ru' =>'Макао', 'name_en' =>'Macao', 'code' =>'MAC', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Makedoniya', 'name_ru' =>'Македония', 'name_en' =>'Macedonia', 'code' =>'MKD', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Madagaskar', 'name_ru' =>'Мадагаскар', 'name_en' =>'Madagascar', 'code' =>'MDG', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Malavi', 'name_ru' =>'Малави', 'name_en' =>'Malawi', 'code' =>'MWI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Malayziya', 'name_ru' =>'Малайзия', 'name_en' =>'Malaysia', 'code' =>'MYS', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Maldiv orollari', 'name_ru' =>'Мальдивы', 'name_en' =>'Maldives', 'code' =>'MDV', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Mali', 'name_ru' =>'Мали', 'name_en' =>'Mali', 'code' =>'MLI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Malta', 'name_ru' =>'Мальта', 'name_en' =>'Malta', 'code' =>'MLT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Marshall orollari', 'name_ru' =>'Маршалловы острова', 'name_en' =>'Marshall Islands', 'code' =>'MHL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Martinique', 'name_ru' =>'Мартиника', 'name_en' =>'Martinique', 'code' =>'MTQ', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Mavritaniya', 'name_ru' =>'Мавритания', 'name_en' =>'Mauritania', 'code' =>'MRT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Mavrikiy', 'name_ru' =>'Маврикий', 'name_en' =>'Mauritius', 'code' =>'MUS', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Mayotte', 'name_ru' =>'Майотта', 'name_en' =>'Mayotte', 'code' =>'MYT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Meksika', 'name_ru' =>'Мексика', 'name_en' =>'Mexico', 'code' =>'MEX', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Mikroneziya', 'name_ru' =>'Микронезия', 'name_en' =>'Micronesia', 'code' =>'FSM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Moldava', 'name_ru' =>'Moldava', 'name_en' =>'Moldava', 'code' =>'MDA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Monako', 'name_ru' =>'Монако', 'name_en' =>'Monaco', 'code' =>'MCO', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Mo\'g\'uliston', 'name_ru' =>'Монголия', 'name_en' =>'Mongolia', 'code' =>'MNG', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Chernogoriya', 'name_ru' =>'Черногори', 'name_en' =>'Montenegro', 'code' =>'MNE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Montserrat', 'name_ru' =>'Монсеррат', 'name_en' =>'Montserrat', 'code' =>'MSR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Marokash', 'name_ru' =>'Марокко', 'name_en' =>'Morocco', 'code' =>'MAR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Mozambik', 'name_ru' =>'Мозамбик', 'name_en' =>'Mozambique', 'code' =>'MOZ', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Myanma (Birma)', 'name_ru' =>'Мьянма (Бирма)', 'name_en' =>'Myanmar (Burma)', 'code' =>'MMR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Namibiya', 'name_ru' =>'Намибия', 'name_en' =>'Namibia', 'code' =>'NAM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Nauru', 'name_ru' =>'Науру', 'name_en' =>'Nauru', 'code' =>'NRU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Nepal', 'name_ru' =>'Непал', 'name_en' =>'Nepal', 'code' =>'NPL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Niderlandiya', 'name_ru' =>'Нидерланды', 'name_en' =>'Netherlands', 'code' =>'NLD', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Yangi Kaledoniya', 'name_ru' =>'Новая Каледония', 'name_en' =>'New Caledonia', 'code' =>'NCL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Yangi Zelandiya', 'name_ru' =>'Новая Зеландия', 'name_en' =>'New Zealand', 'code' =>'NZL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Nikaragua', 'name_ru' =>'Никарагуа', 'name_en' =>'Nicaragua', 'code' =>'NIC', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Niger', 'name_ru' =>'Нигер', 'name_en' =>'Niger', 'code' =>'NER', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Nigeriya', 'name_ru' =>'Нигерия', 'name_en' =>'Nigeria', 'code' =>'NGA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Niue', 'name_ru' =>'Ниуэ', 'name_en' =>'Niue', 'code' =>'NIU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Norfolk oroli', 'name_ru' =>'Остров Норфолк', 'name_en' =>'Norfolk Island', 'code' =>'NFK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Shimoliy Koreya', 'name_ru' =>'Северная Корея', 'name_en' =>'North Korea', 'code' =>'PRK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Shimoliy Marian orollari', 'name_ru' =>'Северные Марианские острова', 'name_en' =>'Northern Mariana Islands', 'code' =>'MNP', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Norvegiya', 'name_ru' =>'Норвегия', 'name_en' =>'Norway', 'code' =>'NOR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ummon', 'name_ru' =>'Оман', 'name_en' =>'Oman', 'code' =>'OMN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Pokiston', 'name_ru' =>'Пакистан', 'name_en' =>'Pakistan', 'code' =>'PAK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Palau', 'name_ru' =>'Palau', 'name_en' =>'Palau', 'code' =>'PLW', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Falastin', 'name_ru' =>'Палестина', 'name_en' =>'Palestine', 'code' =>'PSE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Panama', 'name_ru' =>'Панама', 'name_en' =>'Panama', 'code' =>'PAN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Papua-Yangi Gvineya', 'name_ru' =>'Папуа - Новая Гвинея', 'name_en' =>'Papua New Guinea', 'code' =>'PNG', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Paragvay', 'name_ru' =>'Парагвай', 'name_en' =>'Paraguay', 'code' =>'PRY', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Peru', 'name_ru' =>'Перу', 'name_en' =>'Peru', 'code' =>'PER', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Filippinlar', 'name_ru' =>'Phillipines', 'name_en' =>'Phillipines', 'code' =>'PHL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Pitkairn', 'name_ru' =>'Pitcairn', 'name_en' =>'Pitcairn', 'code' =>'PCN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Polsha', 'name_ru' =>'Польша', 'name_en' =>'Poland', 'code' =>'POL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Portugaliya', 'name_ru' =>'Португалия', 'name_en' =>'Portugal', 'code' =>'PRT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Puerto-Riko', 'name_ru' =>'Пуэрто-Рико', 'name_en' =>'Puerto Rico', 'code' =>'PRI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Qatar', 'name_ru' =>'Катар', 'name_en' =>'Qatar', 'code' =>'QAT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Uchrashuv', 'name_ru' =>'Воссоединение', 'name_en' =>'Reunion', 'code' =>'REU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ruminiya', 'name_ru' =>'Румыния', 'name_en' =>'Romania', 'code' =>'ROU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Rossiya', 'name_ru' =>'Россия', 'name_en' =>'Russia', 'code' =>'RUS', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ruanda', 'name_ru' =>'Руанда', 'name_en' =>'Rwanda', 'code' =>'RWA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sent-Bartelmi', 'name_ru' =>'Святой Бартельми', 'name_en' =>'Saint Barthelemy', 'code' =>'BLM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Avliyo Yelena', 'name_ru' =>'Святая Елена', 'name_en' =>'Saint Helena', 'code' =>'SHN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sent-Kits va Nevis', 'name_ru' =>'Сент-Китс и Невис', 'name_en' =>'Saint Kitts and Nevis', 'code' =>'KNA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sent-Lusiya', 'name_ru' =>'Сент-Люсия', 'name_en' =>'Saint Lucia', 'code' =>'LCA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sent-Martin', 'name_ru' =>'Святой Мартин', 'name_en' =>'Saint Martin', 'code' =>'MAF', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sent-Per va Mikelon', 'name_ru' =>'Сен-Пьер и Микелон', 'name_en' =>'Saint Pierre and Miquelon', 'code' =>'SPM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sent-Vinsent va Grenadinlar', 'name_ru' =>'Святой Винсент и Гренадины', 'name_en' =>'Saint Vincent and the Grenadines', 'code' =>'VCT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Samoa', 'name_ru' =>'Самоа', 'name_en' =>'Samoa', 'code' =>'WSM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'San-Marino', 'name_ru' =>'Сан-Марино', 'name_en' =>'San Marino', 'code' =>'SMR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'San-Tome va Prinsipi', 'name_ru' =>'Сан-Томе и Принсипи', 'name_en' =>'Sao Tome and Principe', 'code' =>'STP', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Saudiya Arabistoni', 'name_ru' =>'Саудовская Аравия', 'name_en' =>'Saudi Arabia', 'code' =>'SAU', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Senegal', 'name_ru' =>'Сенегал', 'name_en' =>'Senegal', 'code' =>'SEN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Serbiya', 'name_ru' =>'Сербия', 'name_en' =>'Serbia', 'code' =>'SRB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Seyshel orollari', 'name_ru' =>'Сейшелы', 'name_en' =>'Seychelles', 'code' =>'SYC', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Syerra-Leone', 'name_ru' =>'Сьерра-Леоне', 'name_en' =>'Sierra Leone', 'code' =>'SLE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Singapur', 'name_ru' =>'Сингапур', 'name_en' =>'Singapore', 'code' =>'SGP', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sint Maarten', 'name_ru' =>'Синт-Мартен', 'name_en' =>'Sint Maarten', 'code' =>'SXM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Slovakiya', 'name_ru' =>'Словакия', 'name_en' =>'Slovakia', 'code' =>'SVK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sloveniya', 'name_ru' =>'Словения', 'name_en' =>'Slovenia', 'code' =>'SVN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Solomon Islands', 'name_ru' =>'Соломоновы острова', 'name_en' =>'Solomon Islands', 'code' =>'SLB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Somali', 'name_ru' =>'Сомали', 'name_en' =>'Somalia', 'code' =>'SOM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Janubiy Afrika', 'name_ru' =>'Южная Африка', 'name_en' =>'South Africa', 'code' =>'ZAF', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Janubiy Jorjiya va Janubiy Sandvich orollari', 'name_ru' =>'Южная Георгия и Южные Сандвичевы острова', 'name_en' =>'South Georgia and the South Sandwich Islands', 'code' =>'SGS', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Janubiy Koreya', 'name_ru' =>'Южная Корея', 'name_en' =>'South Korea', 'code' =>'KOR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Janubiy Sudan', 'name_ru' =>'Южный Судан', 'name_en' =>'South Sudan', 'code' =>'SSD', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ispaniya', 'name_ru' =>'Испания', 'name_en' =>'Spain', 'code' =>'ESP', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Shri-Lanka', 'name_ru' =>'Шри-Ланка', 'name_en' =>'Sri Lanka', 'code' =>'LKA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Sudan', 'name_ru' =>'Судан', 'name_en' =>'Sudan', 'code' =>'SDN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Surinam', 'name_ru' =>'Суринам', 'name_en' =>'Suriname', 'code' =>'SUR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Shpitsberd va Yan Mayen', 'name_ru' =>'Шпицберген и Ян Майен', 'name_en' =>'Svalbard and Jan Mayen', 'code' =>'SJM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Svazilend', 'name_ru' =>'Свазиленд', 'name_en' =>'Swaziland', 'code' =>'SWZ', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Shvetsiya', 'name_ru' =>'Швеция', 'name_en' =>'Sweden', 'code' =>'SWE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Shveytsariya', 'name_ru' =>'Швейцария', 'name_en' =>'Switzerland', 'code' =>'CHE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Suriya', 'name_ru' =>'Сирия', 'name_en' =>'Syria', 'code' =>'SYR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Tayvan', 'name_ru' =>'Тайвань', 'name_en' =>'Taiwan', 'code' =>'TWN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Tojikiston', 'name_ru' =>'Таджикистан', 'name_en' =>'Tajikistan', 'code' =>'TJK', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Tanzaniya', 'name_ru' =>'Танзания', 'name_en' =>'Tanzania', 'code' =>'TZA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Tailand', 'name_ru' =>'Таиланд', 'name_en' =>'Thailand', 'code' =>'THA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Timor-Leste (Sharqiy Timor)', 'name_ru' =>'Тимор-Лешти (Восточный Тимор)', 'name_en' =>'Timor-Leste (East Timor)', 'code' =>'TLS', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Bormoq', 'name_ru' =>'Идти', 'name_en' =>'Togo', 'code' =>'TGO', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Tokelau', 'name_ru' =>'Токелау', 'name_en' =>'Tokelau', 'code' =>'TKL', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Tonga', 'name_ru' =>'Тонга', 'name_en' =>'Tonga', 'code' =>'TON', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Trinidad va Tobago', 'name_ru' =>'Тринидад и Тобаго', 'name_en' =>'Trinidad and Tobago', 'code' =>'TTO', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Tunis', 'name_ru' =>'Тунис', 'name_en' =>'Tunisia', 'code' =>'TUN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Kurka', 'name_ru' =>'Турция', 'name_en' =>'Turkey', 'code' =>'TUR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Turkmaniston', 'name_ru' =>'Туркменистан', 'name_en' =>'Turkmenistan', 'code' =>'TKM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Turk va Kaykos orollari', 'name_ru' =>'Острова Теркс и Кайкос', 'name_en' =>'Turks and Caicos Islands', 'code' =>'TCA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Tuvalu', 'name_ru' =>'Тувалу', 'name_en' =>'Tuvalu', 'code' =>'TUV', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Uganda', 'name_ru' =>'Уганда', 'name_en' =>'Uganda', 'code' =>'UGA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ukraina', 'name_ru' =>'Украина', 'name_en' =>'Ukraine', 'code' =>'UKR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Birlashgan Arab Amirliklari', 'name_ru' =>'Объединенные Арабские Эмираты', 'name_en' =>'United Arab Emirates', 'code' =>'ARE', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Birlashgan Qirollik', 'name_ru' =>'Объединенное Королевство', 'name_en' =>'United Kingdom', 'code' =>'GBR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Qo\'shma Shtatlar', 'name_ru' =>'Соединенные Штаты', 'name_en' =>'United States', 'code' =>'USA', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'AQShning kichik tashqi orollar', 'name_ru' =>'Малые отдаленные острова США', 'name_en' =>'United States Minor Outlying Islands', 'code' =>'UMI', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Urugvay', 'name_ru' =>'Уругвай', 'name_en' =>'Uruguay', 'code' =>'URY', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Ozbekiston', 'name_ru' =>'Узбекистан', 'name_en' =>'Uzbekistan', 'code' =>'UZB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Vanuatu', 'name_ru' =>'Вануату', 'name_en' =>'Vanuatu', 'code' =>'VUT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Vatikan shahri', 'name_ru' =>'Ватикан', 'name_en' =>'Vatican City', 'code' =>'VAT', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Venesuela', 'name_ru' =>'Венесуэла', 'name_en' =>'Venezuela', 'code' =>'VEN', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Vetnam', 'name_ru' =>'Вьетнам', 'name_en' =>'Vietnam', 'code' =>'VNM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Virgin orollari, Britaniya', 'name_ru' =>'Британские Виргинские острова', 'name_en' =>'Virgin Islands, British', 'code' =>'VGB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Virjiniya orollari, AQSh', 'name_ru' =>'Виргинские острова, США', 'name_en' =>'Virgin Islands, US', 'code' =>'VIR', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Uollis va Futuna', 'name_ru' =>'Уоллис и Футуна', 'name_en' =>'Wallis and Futuna', 'code' =>'WLF', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'G\'arbiy Sahro', 'name_ru' =>'Западная Сахара', 'name_en' =>'Western Sahara', 'code' =>'ESH', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Yaman', 'name_ru' =>'Йемен', 'name_en' =>'Yemen', 'code' =>'YEM', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Zambiya', 'name_ru' =>'Замбия', 'name_en' =>'Zambia', 'code' =>'ZMB', ]);
$this->insert('countries', ['status'=>1,     'name_uz' =>'Zimbabve', 'name_ru' =>'Зимбабве', 'name_en' =>'Zimbabwe', 'code' =>'ZWE', ]);
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%countries}}');
    }
}
