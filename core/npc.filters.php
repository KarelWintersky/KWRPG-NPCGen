<?php

class npcFilters {
    public static $_ = array();
    // раса
    public static $race = array(
        'хомо'          => 60,
        'фэйри'         => 35,
        'нэйрэт'        => 0,
        'старрел'       => 0,
        'ракаста'       => 0,
        'хомо/нэйрэт'   => 3,
        'фэйри/нэйрэт'  => 2,
    );
    // возраст
    public static $age = array(
        10 => 5,
        11 => 25,
        12 => 35,
        13 => 25,
        14 => 10
    );
    // пол
    public static $sex = array(
        'М' => 57,
        'Ж' => 40,
        'MtF' => 1,
        'FtM' => 2
    );

    // базовые статы в возрасте 5 лет
    public static $base_stats_with_race = array(
        'хомо' => array(
            'str'   =>  3,
            'dex'   =>  2,
            'int'   =>  2,
            'wpw'   =>  2
        ),
        'фэйри' => array(
            'str'   =>  2,
            'dex'   =>  3,
            'int'   =>  2,
            'wpw'   =>  2
        ),
        'хомо/нэйрэт' => array(
            'str'   =>  3,
            'dex'   =>  2,
            'int'   =>  2,
            'wpw'   =>  3
        ),
        'фэйри/нэйрэт' => array(
            'str'   =>  2,
            'dex'   =>  3,
            'int'   =>  2,
            'wpw'   =>  3
        ),
        'нэйрэт' => array(
            'str'   =>  3,
            'dex'   =>  3,
            'int'   =>  2,
            'wpw'   =>  2
        ),
        'старрел' => array(
            'str'   =>  2,
            'dex'   =>  3,
            'int'   =>  3,
            'wpw'   =>  2
        ),
        'ракаста' => array(
            'str'   =>  3,
            'dex'   =>  4,
            'int'   =>  1,
            'wpw'   =>  1
        )
    );

    // происхождения

    public static $origins = array(
        'бродяга' => 5,
        'табор' => 5,
        'заимка' => 5,
        'деревня' => 20,
        'форт' => 30,
        'город' => 35
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
        'табор' => array(
            'str'   =>  15,
            'dex'   =>  45,
            'int'   =>  20,
            'wpw'   =>  20
        ),
        'заимка' => array(
            'str'   =>  35,
            'dex'   =>  25,
            'int'   =>  15,
            'wpw'   =>  25
        ),
        'деревня' => array(
            'str'   =>  25,
            'dex'   =>  25,
            'int'   =>  20,
            'wpw'   =>  30
        ),
        'форт' => array(
            'str'   =>  30,
            'dex'   =>  20,
            'int'   =>  30,
            'wpw'   =>  20
        ),
        'город' => array(
            'str'   =>  15,
            'dex'   =>  25,
            'int'   =>  30,
            'wpw'   =>  30
        ),
    );

    // **** модификаторы тестов
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
        'табор' => array(
            'endurance'     => 2, // STR: выносливость (пассивная)
            'fitness'       => 3, // STR: физподготовка (активная)
            'dexterity'     => 3, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => -2, // WPW: уживчивость
            'leadership'    => -2, // WPW: лидерство
        ),
        'заимка' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 2, // DEX: способность к запоминанию информации
            'curiosity'     => 2, // INT: Любознательность
            'savvy'         => 2, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => -2, // WPW: лидерство
        ),
        'деревня' => array(
            'endurance'     => 2, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 2, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 2, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => -2, // WPW: лидерство
        ),
        'форт' => array(
            'endurance'     => 2, // STR: выносливость (пассивная)
            'fitness'       => 4, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => -2, // DEX: способность к запоминанию информации
            'curiosity'     => -2, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 2, // WPW: лидерство
        ),
        'город' => array(
            'endurance'     => -1, // STR: выносливость (пассивная)
            'fitness'       => -1, // STR: физподготовка (активная)
            'dexterity'     => 1, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 2, // INT: Любознательность
            'savvy'         => 3, // INT: смекалка
            'even_tempered' => 2, // WPW: уживчивость
            'leadership'    => -2, // WPW: лидерство
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
        'хомо' => array(
            'endurance'     => 1, // STR: выносливость (пассивная)
            'fitness'       => 1, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 1, // DEX: способность к запоминанию информации
            'curiosity'     => 1, // INT: Любознательность
            'savvy'         => 1, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'фэйри' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 1, // STR: физподготовка (активная)
            'dexterity'     => 2, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 1, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 1, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'нэйрэт' => array(
            'endurance'     => 1, // STR: выносливость (пассивная)
            'fitness'       => 1, // STR: физподготовка (активная)
            'dexterity'     => 3, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => -1,// WPW: уживчивость
            'leadership'    => 1, // WPW: лидерство
        ),
        'старрел' => array(
            'endurance'     => 1, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 1, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 2, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 1, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'ракаста' => array(
            'endurance'     => 1, // STR: выносливость (пассивная)
            'fitness'       => 2, // STR: физподготовка (активная)
            'dexterity'     => 1, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 1, // INT: Любознательность
            'savvy'         => -1, // INT: смекалка
            'even_tempered' => 1, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'хомо/нэйрэт' => array(
            'endurance'     => 1, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 1, // INT: смекалка
            'even_tempered' => 2, // WPW: уживчивость
            'leadership'    => 1, // WPW: лидерство
        ),
        'фэйри/нэйрэт' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 1, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: проворство
            'memory'        => 1, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 1, // INT: смекалка
            'even_tempered' => 2, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
    );

    // ***** аггро
    // бонус агрессии от расы
    public static $base_aggro_with_race = array(
        'хомо'          => 0,
        'фэйри'         => -1,
        'нэйрэт'        => +1,
        'старрел'       => 0,
        'ракаста'       => +2,
        'хомо/нэйрэт'   => +1,
        'фэйри/нэйрэт'  => 0,
    );
    // бонус агрессии от расы
    public static $base_aggro_with_origin = array(
        'бродяга'       => +1,
        'табор'         => +1,
        'заимка'        => 0,
        'деревня'       => -1,
        'форт'          => +2,
        'город'         => -1
    );

    // возможные буквы для имени
    public static $letters = array(
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ш', 'Э', 'Ю', 'Я', '™'
    );

    // здоровье, зрение и инвалидность
    public static $health_base = array(
        'отличное' => 15,
        'хорошее' => 40,
        'норма' => 30,
        'плохое' => 10,
        'болен' => 5
    );
    public static $health_disabled = array(
        'нет' => 97,
        'врожд.' => 1,
        'травма' => 2
    );
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




}


?>