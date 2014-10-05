<?php

class npcFilters {
    public static $_ = array();
    // раса
    public static $race = array(
        'хомо' => 60,
        'фэйри' => 35,
        'хомо/нэйрэт' => 3,
        'фэйри/нэйрэт' => 2
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
    // модификаторы (базовые значения) к тестам в зависимости от происхождения (origin)
    public static $base_tests_with_origin = array(
        'commoner' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: физическая ловкость
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'бродяга' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: физическая ловкость
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'табор' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: физическая ловкость
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'заимка' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: физическая ловкость
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'деревня' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: физическая ловкость
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'форт' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: физическая ловкость
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
        'город' => array(
            'endurance'     => 0, // STR: выносливость (пассивная)
            'fitness'       => 0, // STR: физподготовка (активная)
            'dexterity'     => 0, // DEX: физическая ловкость
            'memory'        => 0, // DEX: способность к запоминанию информации
            'curiosity'     => 0, // INT: Любознательность
            'savvy'         => 0, // INT: смекалка
            'even_tempered' => 0, // WPW: уживчивость
            'leadership'    => 0, // WPW: лидерство
        ),
    );
}


?>