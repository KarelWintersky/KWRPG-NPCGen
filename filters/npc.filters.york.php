<?php

/**
 * Class npcFilters
 */
class npcFiltersYork extends npcFilters {
    public static $template_header = "Контингент Йорка для экспедиции";
    public static $_ = array();

    // Родная планета
    public static $race = array(
        "Йорк"          =>  70,
        "Йорк/эльф"     =>  10,
        "Найтвиш"       =>  5,
        "Солярис"       =>  5,
        "Райтмир"       =>  3,
        "Гайя"          =>  2,
        "Арлисс"        =>  1,
        "Лордаэрон"     =>  3,
        "Авалон"        =>  1,
        "Айодхья"       =>  2,
        "Иттегост"      =>  2,
        "иное"          =>  5
    );
    
    // Происхождение (генкарта)
    public static $origins = array(
        "<font color='yellow'>белая</font>"         => 5,
        "<font color='orange'>оранжевая</font>"     => 5,
        "<font color='green'>зеленая</font>"        => 10,
        "<font color='#00ffff'>голубая</font>"      => 15,
        "<font color='blue'>синяя</font>"           => 25,
        "<font color='#ff00ff'>фиолетовая</font>"   => 15,
        "черная"                                    => 10
    );
    
    // возраст (определяется в init как функция)
    public static $age;

    // пол
    public static $sex = array(
        "М" => 50,
        "Ж" => 49,
        "?" => 1
    );

    // базовые статы в возрасте 5 лет (в сумме обычно 4+5 = 9, то есть все по 2 + 1 парам)
    public static $base_stats_with_race = array(
        "Йорк" => array(
            "str"   =>  3,
            "dex"   =>  2,
            "int"   =>  2,
            "wpw"   =>  2
        ),
        "Йорк/эльф" => array(
            "str"   =>  1,
            "dex"   =>  3,
            "int"   =>  2,
            "wpw"   =>  3
        ),
        "Найтвиш" => array(
            "str"   =>  2,
            "dex"   =>  2,
            "int"   =>  3,
            "wpw"   =>  2
        ),
        "Солярис" => array(
            "str"   =>  1,
            "dex"   =>  2,
            "int"   =>  3,
            "wpw"   =>  3
        ),
        "Райтмир" => array(
            "str"   =>  1,
            "dex"   =>  1,
            "int"   =>  3,
            "wpw"   =>  3
        ),
        "Гайя" => array(
            "str"   =>  3,
            "dex"   =>  3,
            "int"   =>  1,
            "wpw"   =>  1
        ),
        "Арлисс" => array(
            "str"   =>  2,
            "dex"   =>  3,
            "int"   =>  1,
            "wpw"   =>  2
        ),
        "Лордаэрон" => array(
            "str"   =>  1,
            "dex"   =>  4,
            "int"   =>  2,
            "wpw"   =>  1
        ),
        "Авалон" => array(
            "str"   =>  2,
            "dex"   =>  2,
            "int"   =>  2,
            "wpw"   =>  3
        ),
        "Айодхья" => array(
            "str"   =>  2,
            "dex"   =>  2,
            "int"   =>  2,
            "wpw"   =>  3
        ),
        "Иттегост" => array(
            "str"   =>  2,
            "dex"   =>  3,
            "int"   =>  2,
            "wpw"   =>  2
        ),
        "иное" => array(
            "str"   =>  3,
            "dex"   =>  2,
            "int"   =>  2,
            "wpw"   =>  2
        )
    );

    // шансы роста параметров в зависимости от происхождения
    public static $stats_gain_chance = array(
        "<font color='yellow'>белая</font>" => array(
            "str"   =>  25,
            "dex"   =>  25,
            "int"   =>  25,
            "wpw"   =>  25
        ),
        "<font color='orange'>оранжевая</font>" => array(
            "str"   =>  25,
            "dex"   =>  25,
            "int"   =>  25,
            "wpw"   =>  25
        ),
        "<font color='green'>зеленая</font>" => array(
            "str"   =>  20,
            "dex"   =>  25,
            "int"   =>  30,
            "wpw"   =>  25
        ),
        "<font color='#00ffff'>голубая</font>" => array(
            "str"   =>  20,
            "dex"   =>  20,
            "int"   =>  30,
            "wpw"   =>  30
        ),
        "<font color='blue'>синяя</font>" => array(
            "str"   =>  15,
            "dex"   =>  20,
            "int"   =>  30,
            "wpw"   =>  35
        ),
        "<font color='#ff00ff'>фиолетовая</font>" => array(
            "str"   =>  10,
            "dex"   =>  15,
            "int"   =>  35,
            "wpw"   =>  50
        ),
        "черная" => array(
            "str"   =>  10,
            "dex"   =>  10,
            "int"   =>  40,
            "wpw"   =>  50
        )
    );

    // **** МОДИФИКАТОРЫ ТЕСТОВ
    // модификаторы (базовые значения) к тестам в зависимости от происхождения (origin)
    public static $base_tests_with_origin = array(
        "<font color='yellow'>белая</font>" => array(
            "endurance"     => 3, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => 2, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => -2, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => -5, // WPW: уживчивость
            "leadership"    => 3, // WPW: лидерство
        ),
        "<font color='orange'>оранжевая</font>" => array(
            "endurance"     => 1, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => 0, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => -3, // WPW: уживчивость
            "leadership"    => 1, // WPW: лидерство
        ),
        "<font color='green'>зеленая</font>" => array(
            "endurance"     => 0, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 1, // DEX: способность к запоминанию информации
            "curiosity"     => 1, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => -1, // WPW: уживчивость
            "leadership"    => 1, // WPW: лидерство
        ),
        "<font color='#00ffff'>голубая</font>" => array(
            "endurance"     => 0, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => -1, // DEX: проворство
            "memory"        => 2, // DEX: способность к запоминанию информации
            "curiosity"     => 1, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => 0, // WPW: уживчивость
            "leadership"    => 0, // WPW: лидерство
        ),
        "<font color='blue'>синяя</font>" => array(
            "endurance"     => -1, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => -1, // DEX: проворство
            "memory"        => 2, // DEX: способность к запоминанию информации
            "curiosity"     => 2, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => 1, // WPW: уживчивость
            "leadership"    => 0, // WPW: лидерство
        ),
        "<font color='#ff00ff'>фиолетовая</font>" => array(
            "endurance"     => -3, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 1, // DEX: способность к запоминанию информации
            "curiosity"     => 1, // INT: Любознательность
            "savvy"         => 1, // INT: смекалка
            "even_tempered" => 2, // WPW: уживчивость
            "leadership"    => -1, // WPW: лидерство
        ),
        "черная" => array(
            "endurance"     => -3, // STR: выносливость (пассивная)
            "fitness"       => -1, // STR: физподготовка (активная)
            "dexterity"     => -1, // DEX: проворство
            "memory"        => 3, // DEX: способность к запоминанию информации
            "curiosity"     => -3, // INT: Любознательность
            "savvy"         => 3, // INT: смекалка
            "even_tempered" => 5, // WPW: уживчивость
            "leadership"    => -5, // WPW: лидерство
        )
    );

    // модификаторы (базовые значения) к тестам в зависимости от места рождения)
    public static $base_tests_with_race = array(
        "Йорк" => array(
            "endurance"     => -2, // STR: выносливость (пассивная)
            "fitness"       => -1, // STR: физподготовка (активная)
            "dexterity"     => 1, // DEX: проворство
            "memory"        => -1, // DEX: способность к запоминанию информации
            "curiosity"     => -1, // INT: Любознательность
            "savvy"         => 1, // INT: смекалка
            "even_tempered" => 1, // WPW: уживчивость
            "leadership"    => -1, // WPW: лидерство
        ),
        "Йорк/эльф" => array(
            "endurance"     => -3, // STR: выносливость (пассивная)
            "fitness"       => -2, // STR: физподготовка (активная)
            "dexterity"     => 2, // DEX: проворство
            "memory"        => -1, // DEX: способность к запоминанию информации
            "curiosity"     => 1, // INT: Любознательность
            "savvy"         => 1, // INT: смекалка
            "even_tempered" => 3, // WPW: уживчивость
            "leadership"    => -2, // WPW: лидерство
        ),
        "Найтвиш" => array(
            "endurance"     => 0, // STR: выносливость (пассивная)
            "fitness"       => 2, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => 0, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => 1, // WPW: уживчивость
            "leadership"    => -1, // WPW: лидерство
        ),
        "Солярис" => array(
            "endurance"     => -1, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => 2, // INT: Любознательность
            "savvy"         => 1, // INT: смекалка
            "even_tempered" => 0,// WPW: уживчивость
            "leadership"    => -1, // WPW: лидерство
        ),
        "Райтмир" => array(
            "endurance"     => 1, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 2, // DEX: способность к запоминанию информации
            "curiosity"     => 1, // INT: Любознательность
            "savvy"         => 1, // INT: смекалка
            "even_tempered" => -2, // WPW: уживчивость
            "leadership"    => -1, // WPW: лидерство
        ),
        "Гайя" => array(
            "endurance"     => 3, // STR: выносливость (пассивная)
            "fitness"       => 3, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => -2, // INT: Любознательность
            "savvy"         => 1, // INT: смекалка
            "even_tempered" => 0, // WPW: уживчивость
            "leadership"    => -2, // WPW: лидерство
        ),
        "Арлисс" => array(
            "endurance"     => 2, // STR: выносливость (пассивная)
            "fitness"       => 2, // STR: физподготовка (активная)
            "dexterity"     => 1, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => -1, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => -2, // WPW: уживчивость
            "leadership"    => 1, // WPW: лидерство
        ),
        "Лордаэрон" => array(
            "endurance"     => 1, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => 1, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => 2, // INT: Любознательность
            "savvy"         => 1, // INT: смекалка
            "even_tempered" => 2, // WPW: уживчивость
            "leadership"    => -1, // WPW: лидерство
        ),
        "Авалон" => array(
            "endurance"     => 0, // STR: выносливость (пассивная)
            "fitness"       => 2, // STR: физподготовка (активная)
            "dexterity"     => 1, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => 0, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => -4, // WPW: уживчивость
            "leadership"    => 3, // WPW: лидерство
        ),
        "Айодхья" => array(
            "endurance"     => 1, // STR: выносливость (пассивная)
            "fitness"       => 2, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => 0, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => 2, // WPW: уживчивость
            "leadership"    => -3, // WPW: лидерство
        ),
        "Иттегост" => array(
            "endurance"     => -2, // STR: выносливость (пассивная)
            "fitness"       => -2, // STR: физподготовка (активная)
            "dexterity"     => 4, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => 0, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => 3, // WPW: уживчивость
            "leadership"    => 0, // WPW: лидерство
        ),
        "иное" => array(
            "endurance"     => 0, // STR: выносливость (пассивная)
            "fitness"       => 0, // STR: физподготовка (активная)
            "dexterity"     => 0, // DEX: проворство
            "memory"        => 0, // DEX: способность к запоминанию информации
            "curiosity"     => 0, // INT: Любознательность
            "savvy"         => 0, // INT: смекалка
            "even_tempered" => 0, // WPW: уживчивость
            "leadership"    => 0, // WPW: лидерство
        )

    );

    // ***** АГГРО
    // бонус агрессии от расы
    public static $base_aggro_with_race = array(
        "Йорк"          =>  +5,
        "Йорк/эльф"     =>  +5,
        "Найтвиш"       =>  0,
        "Солярис"       =>  -3,
        "Райтмир"       =>  0,
        "Гайя"          =>  +2,
        "Арлисс"        =>  0,
        "Лордаэрон"     =>  0,
        "Авалон"        =>  +2,
        "Айодхья"       =>  -3,
        "Иттегост"      =>  0,
        "иное"          =>  0
    );
    // бонус агрессии от расы
    public static $base_aggro_with_origin = array(
        "<font color='yellow'>белая</font>"         => 0,
        "<font color='orange'>оранжевая</font>"     => +1,
        "<font color='green'>зеленая</font>"        => +2,
        "<font color='#00ffff'>голубая</font>"      => +4,
        "<font color='blue'>синяя</font>"           => +6,
        "<font color='#ff00ff'>фиолетовая</font>"   => +8,
        "черная"                                    => +10
    );

    // *** возможные буквы для имени
    public static $letters = array(
        "А", "Б", "В", "Г", "Д", "Е", "Ж", "З", "И", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ш", "Э", "Ю", "Я"
    );

    // *** ЗДОРОВЬЕ
    // здоровье, зрение и инвалидность
    public static $health_base = array(
        "отличное"  => 5,
        "хорошее"   => 10,
        "норма"     => 40,
        "плохое"    => 20,
        "болен"     => 10
    );
    public static $health_disabled = array(
        "нет"       => 75,
        "врожд."    => 5,
        "травма"    => 20
    );
    // зрение
    public static $health_vision = array(
        "слепой"    => 3,
        "-"         => 30,
        "~"         => 34,
        "+"         => 20,
        "снайпер"   => 5,
    );
    public static $health_vision_severity = array(
        "½"         => 40,
        "1"         => 35,
        "2"         => 10,
        "3"         => 5,
        "4"         => 5,
        "5"         => 5,
    );
    // Категории болезней, см: http://www.dna-club.com.ua/kategorii_bolezney.htm
    public static $health_disease_type = array(
        "нервной системы"       =>  16, // мигрень, черепно-мозговая травма
        "ДЦП"                   =>  3,
        "мочеполовое"           =>  10, // нарушение менструаций/эректильная дисфункция, бесплодие, воспалительные заболевания,
        "ЖКТ/гастрит"           =>  35, // гастрит, язва
        "ЖКТ/язва"              =>  20,
        "опорно-двиг."          =>  15, // остеопороз, разрушение хрящей,
        "кожное"                =>  15, // дерматит, волчанка, сыпь, фурункулёз
        "бр.астма"              =>  25, // астма, тугоухость, синусит, фарингит,
        "хр.пневмония"          =>  10,
        "синуситы"              =>  25,
        "сердечно-сосудистые"   =>  15
    );

    // *** ЦВЕТ ВОЛОС
    // https://ru.wikipedia.org/wiki/%D0%9F%D0%B8%D0%B3%D0%BC%D0%B5%D0%BD%D1%82%D0%B0%D1%86%D0%B8%D1%8F_%D0%B2%D0%BE%D0%BB%D0%BE%D1%81
    public static $color_hair = array(
        "темные"    =>  20, // черные до темно-коричневого
        "каштан"    =>  20, // темно-русые и каштановые
        "рыжие"     =>  10,
        "русые"     =>  10,
        "льняные"   =>  5,
        "нет"       =>  10,
        "седые"     =>  25,
    );

    // *** ЦВЕТ ГЛАЗ
    // https://ru.wikipedia.org/wiki/%D0%A6%D0%B2%D0%B5%D1%82_%D0%B3%D0%BB%D0%B0%D0%B7
    public static $color_eyes = array(
        "серые"     =>  20,
        "голубые"   =>  10,
        "карие"     =>  20,
        "зеленые"   =>  10,
        "красные"   =>  5,
        "ореховые"  =>  10,
        "лиловые"   =>  5,
        "cyber"     =>  5
    );

    // *** ЭТНОСЫ
    public static $etnic = array();

    public static $confession = array(
        "aтеист"            => 40,
        "crist"             =>  5,
        "muslim"            =>  2,
        "zen"               =>  8,
        "sinto"             =>  6,
        "UniWill"           =>  1,
        "druid"             =>  4,
        "rodno"             =>  2,       // Родноверие
        "TechSham"          =>  10,
        "CyberZ"            =>  2,
    );
    
    public static $is_psi = [
        'G'   =>  1,
        'M'    =>  5,
        'E'    =>  10,
        'A'   =>  20,
        'B'   =>  30,
        '-'         =>  900
    ];
    
    /**
     *
     */
    public static function init()
    {
        self::$age = function() {
            return roll3d6() + roll2d6() + roll2d6();
        };
        
    }

}

