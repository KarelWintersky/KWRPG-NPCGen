<?php
// https://docs.google.com/spreadsheets/d/1DIm3rXQ-jAuVLJM9bu-Nt2SKtJBn41ZSBr1IM-Wn0bI/edit#gid=0
class npcFilters {
    public static $_ = array();

    // раса
    public static $race = array(
        'русский'        => 50,
        'хохол'          => 20,
        'белорус'        => 4,
        'кавказец'       => 3,
        'тюрок'          => 12,
        'еврей'          => 4,
        'карел'          => 4,
        'иностранец'     => 3
    );

    // возраст
    public static $age = array(
        10 => 5,
        11 => 10,
        12 => 15,
        13 => 25,
        14 => 25,
        15 => 15,
        16 => 5
    );

    // пол
    public static $sex = array(
        'М' => 100
    );

    // базовые статы в возрасте 5 лет
    public static $base_stats_with_race = array(
        'русский' => array(
            'str'   =>  3,
            'dex'   =>  2,
            'int'   =>  2,
            'wpw'   =>  2
        ),
        'хохол' => array(
            'str'   =>  3,
            'dex'   =>  2,
            'int'   =>  2,
            'wpw'   =>  2
        ),
        'белорус' => array(
            'str'   =>  3,
            'dex'   =>  2,
            'int'   =>  2,
            'wpw'   =>  3
        ),
        'кавказец' => array(
            'str'   =>  2,
            'dex'   =>  3,
            'int'   =>  2,
            'wpw'   =>  3
        ),
        'тюрок' => array(
            'str'   =>  2,
            'dex'   =>  3,
            'int'   =>  2,
            'wpw'   =>  2
        ),
        'еврей' => array(
            'str'   =>  2,
            'dex'   =>  2,
            'int'   =>  3,
            'wpw'   =>  2
        ),
        'карел' => array(
            'str'   =>  3,
            'dex'   =>  3,
            'int'   =>  1,
            'wpw'   =>  2
        ),
        'иностранец' => array(
            'str'   =>  2,
            'dex'   =>  2,
            'int'   =>  2,
            'wpw'   =>  3
        )
    );

    // происхождения
    public static $origins = array(
        'бродяга'       => 7,
        'крестьянское'  => 23,
        'мещанское'     => 12,
        'чиновничье'    => 18,
        'рабочее'       => 32,
        'дворянское'    => 9,
        'психократ'     => 1
    );

    // шансы роста параметров в зависимости от происхождения
    public static $stats_gain_chance = array(
        'commoner' => array(
            'str'   =>  25,
            'dex'   =>  25,
            'int'   =>  25,
            'wpw'   =>  25
        ),
        'бродяга' => array(
            'str'   =>  30,
            'dex'   =>  25,
            'int'   =>  15,
            'wpw'   =>  30
        ),
        'крестьянское' => array(
            'str'   =>  30,
            'dex'   =>  30,
            'int'   =>  20,
            'wpw'   =>  20
        ),
        'мещанское' => array(
            'str'   =>  20,
            'dex'   =>  30,
            'int'   =>  30,
            'wpw'   =>  20
        ),
        'чиновничье' => array(
            'str'   =>  20,
            'dex'   =>  20,
            'int'   =>  30,
            'wpw'   =>  30
        ),
        'рабочее' => array(
            'str'   =>  35,
            'dex'   =>  20,
            'int'   =>  20,
            'wpw'   =>  25
        ),
        'дворянское' => array(
            'str'   =>  20,
            'dex'   =>  20,
            'int'   =>  30,
            'wpw'   =>  30
        ),
        'психократ' => array(
            'str'   =>  15,
            'dex'   =>  25,
            'int'   =>  25,
            'wpw'   =>  35
        ),
    );

    // **** МОДИФИКАТОРЫ ТЕСТОВ
    // модификаторы (базовые значения) к тестам в зависимости от происхождения (origin)
    public static $base_tests_with_origin = array(
        'commoner' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'бродяга' => array(
            'endurance'     => 2, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 2, // DEX: проворство
            'memory'        => 1, // DEX: способность к запоминанию информации
            'curiosity'     => 1, // INT: Любознательность
            'savvy'         => 2, // INT: смекалка
            'even_tempered' => -4, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'крестьянское' => array(
            'endurance'     => 2, // STR: выносливость (пассивная)
            'fitness'       => 3, // STR: физподготовка (активная)
            'dexterity'     => 3, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => -2, // WPW: уживчивость
            'leadership'    => -2, // WPW: лидерство
        ),
        'мещанское' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 2, // DEX: способность к запоминанию информации
            'curiosity'     => 2, // INT: Любознательность
            'savvy'         => 2, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => -2, // WPW: лидерство
        ),
        'чиновничье' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 2, // DEX: способность к запоминанию информации
            'curiosity'     => 2, // INT: Любознательность
            'savvy'         => 2, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => -2, // WPW: лидерство
        ),
        'рабочее' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 2, // STR: физподготовка (активная)
            'dexterity'     => -1, // DEX: проворство
            'memory'        => -1, // DEX: способность к запоминанию информации
            'curiosity'     => -1, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 3, // WPW: уживчивость
            'leadership'    => 2, // WPW: лидерство
        ),
        'дворянское' => array(
            'endurance'     => -1, // STR: выносливость (пассивная)
            'fitness'       => -1, // STR: физподготовка (активная)
            'dexterity'     => 2, // DEX: проворство
            'memory'        => 2, // DEX: способность к запоминанию информации
            'curiosity'     => 1, // INT: Любознательность
            'savvy'         => 2, // INT: смекалка
            'even_tempered' => -2, // WPW: уживчивость
            'leadership'    => 1, // WPW: лидерство
        ),
        'психократ' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 3, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => -3, // WPW: уживчивость
            'leadership'    => 4, // WPW: лидерство
        ),
    );

    // модификаторы (базовые значения) к тестам в зависимости от расы)
    public static $base_tests_with_race = array(
        'any' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'русский' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'хохол' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'белорус' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0,// WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'кавказец' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 1, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => -1, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'тюрок' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'еврей' => array(
            'endurance'     => -1, // STR: выносливость (пассивная)
            'fitness'       => -1, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 1, // INT: Любознательность
            'savvy'         => 1, // INT: смекалка
            'even_tempered' => -1, // WPW: уживчивость
            'leadership'    => -1, // WPW: лидерство
        ),
        'карел' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 1, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => -1, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'иностранец' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),

    );

    // ***** АГГРО
    // бонус агрессии от расы
    public static $base_aggro_with_race = array(
        'русский'          => 0,
        'хохол'         => 0,
        'белорус'        => 0,
        'кавказец'       => +2,
        'тюрок'       => 0,
        'еврей'   => -1,
        'карел'  => 0,
        'иностранец' => +1
    );
    // бонус агрессии от расы
    public static $base_aggro_with_origin = array(
        'бродяга'       => +1,
        'крестьянское'  => -1,
        'мещанское'     => -1,
        'чиновничье'    => -2,
        'рабочее'       => +3,
        'дворянское'    => 0,
        'психократ'     => +2
    );

    // *** возможные буквы для имени
    public static $letters = array(
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ш', 'Э', 'Ю', 'Я'
    );

    // *** ЗДОРОВЬЕ
    // здоровье, зрение и инвалидность
    public static $health_base = array(
        'отличное' => 15,
        'хорошее' => 40,
        'норма' => 30,
        'плохое' => 10,
        'болен' => 5
    );
    public static $health_disabled = array(
        'нет' => 80,
        'врожд.' => 1,
        'травма' => 19
    );
    // зрение
    public static $health_vision = array(
        'слепой' => 1,
        "-" => 10,
        '~' => 54,
        '+' => 30,
        'снайпер' => 5,
    );
    public static $health_vision_severity = array(
        '½' => 40,
        '1' => 35,
        '2' => 10,
        '3' => 5,
        '4' => 5,
        '5' => 5,
    );
    // Категории болезней, см: http://www.dna-club.com.ua/kategorii_bolezney.htm
    public static $health_disease_type = array(
        'нервной системы'       => 16, // мигрень, черепно-мозговая травма, ретровирусы, ДЦП
        'мочеполовое'           => 10, // нарушение менструаций/эректильная дисфункция, бесплодие, воспалительные заболевания,
        'ЖКТ'                   => 20, // гастрит, язва, гепатит, глисты
        'опорно-двиг.'          => 25, // остеопороз, разрушение хрящей,
        'кожное'                => 15, // дерматит, волчанка, сыпь, фурункулёз
        'бронхо-легочное'       => 14, // астма, тугоухость, синусит, фарингит,
    );

    // *** ЦВЕТ ВОЛОС
    // https://ru.wikipedia.org/wiki/%D0%9F%D0%B8%D0%B3%D0%BC%D0%B5%D0%BD%D1%82%D0%B0%D1%86%D0%B8%D1%8F_%D0%B2%D0%BE%D0%BB%D0%BE%D1%81
    public static $color_hair = array(
        'темные'    => 20, // черные до темно-коричневого
        'каштан'    => 35, // темно-русые и каштановые
        'рыжие'     => 10,
        'русые'     => 18,
        'льняные'   => 10,
        'белые'     => 3,
        'нет'       => 2,
        'седые'     => 2,
    );

    // *** ЦВЕТ ГЛАЗ
    // https://ru.wikipedia.org/wiki/%D0%A6%D0%B2%D0%B5%D1%82_%D0%B3%D0%BB%D0%B0%D0%B7
    public static $color_eyes = array(
        'серые'     => 20,
        'голубые'   => 18,
        'карие'     => 25,
        'зеленые'   => 20,
        'красные'   => 5,
        'ореховые'  => 10,
        'лиловые'   => 2,
    );

    // *** ЭТНОСЫ
    public static $etnic = array();

    public static $confession = array(
        'атеист'        => 100
    );

}


?>