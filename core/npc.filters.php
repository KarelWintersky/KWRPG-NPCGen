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

    // базовые статы в возрасте 9 лет
    public static $race_base_stats = array(
        'хомо' => array(
            'str'   =>  4,
            'dex'   =>  3,
            'int'   =>  3,
            'wpw'   =>  3
        ),
        'фэйри' => array(
            'str'   =>  3,
            'dex'   =>  4,
            'int'   =>  3,
            'wpw'   =>  3
        ),
        'хомо/нэйрэт' => array(
            'str'   =>  4,
            'dex'   =>  3,
            'int'   =>  3,
            'wpw'   =>  4
        ),
        'фэйри/нэйрэт' => array(
            'str'   =>  3,
            'dex'   =>  4,
            'int'   =>  3,
            'wpw'   =>  4
        ),
        'нэйрэт' => array(
            'str'   =>  4,
            'dex'   =>  4,
            'int'   =>  3,
            'wpw'   =>  3
        ),
        'старрел' => array(
            'str'   =>  3,
            'dex'   =>  4,
            'int'   =>  4,
            'wpw'   =>  3
        ),
        'ракаста' => array(
            'str'   =>  4,
            'dex'   =>  5,
            'int'   =>  2,
            'wpw'   =>  2
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
            'str'   =>  25,
            'dex'   =>  25,
            'int'   =>  25,
            'wpw'   =>  25
        ),
        'табор' => array(
            'str'   =>  25,
            'dex'   =>  25,
            'int'   =>  25,
            'wpw'   =>  25
        ),
        'заимка' => array(
            'str'   =>  25,
            'dex'   =>  25,
            'int'   =>  25,
            'wpw'   =>  25
        ),
        'деревня' => array(
            'str'   =>  25,
            'dex'   =>  25,
            'int'   =>  25,
            'wpw'   =>  25
        ),
        'форт' => array(
            'str'   =>  25,
            'dex'   =>  25,
            'int'   =>  25,
            'wpw'   =>  25
        ),
        'город' => array(
            'str'   =>  25,
            'dex'   =>  25,
            'int'   =>  25,
            'wpw'   =>  25
        ),
    );
}


?>