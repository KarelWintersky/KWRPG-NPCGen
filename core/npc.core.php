<?php
require_once 'npc.randoms.php';

class npcCore {
    public $npc_template = array(
        // базовые данные
        'race'              => '',
        'age'               => 0,
        'sex'               => '',
        // базовые производные
        'color'     => array(
            'eye'           => '',
            'hair'          => '',
            'skin'          => '' // unused
        ),
        // здоровье
        'health'    => array(
            'base'          => 0,
            'disease_type'  => '', // тип болезни, если болен
            'vision'        => '',
            'disabled'      => '',
        ),
        // происхождение
        'origin'            => '',
        'origin_wealth'     => 0, // богатство
        'confession'        =>  '', // вероисповедание
        // stats
        'stats' => array(
            'str'           => 0,
            'dex'           => 0,
            'int'           => 0,
            'wpw'           => 0
        ),
        'tests' => array(
            // офп
            'endurance'     => 0, // выносливость (пассивная)
            'fitness'       => 0, // физподготовка (активная)
            // dexterity
            'dexterity'     => 0, // физическая ловкость
            'memory'        => 0, // способность к запоминанию информации
            // разум
            'curiosity'     => 0, // Любознательность
            'savvy'         => 0, // смекалка
            // пси
            'even_tempered' => 0, // уживчивость
            'leadership'    => 0, // лидерство
        ),
        'psi'   => array( // психические показатели
            'aggro'         => 0,
        )
    );

    public $__CACHE = array();

    // generate array hash key
    public function array_hash($array)
    {
        return md5( json_encode($array) );
    }

    // make xlat array for filter presented with array()
    public function mapFilterArray( $filter )
    {
        $xlat = array( 0 => 'NULL' );
        if (!is_array ($filter)) {
            printf("Exception in function <strong>%s</strong>, input value is not array and have <strong>%s</strong> type ", __FUNCTION__, gettype($filter));
            die();
        }
        foreach ($filter as $param => $count)
        {
            for ($i = 1; $i <= $count; $i++) $xlat[] = $param;
        }
        return $xlat;
    }

    // кидаем случайное значение и пропускаем его через фильтр сопоставления
    // который нужен, чтобы сгенерировать "перекошенное" случайное значение
    public function rndWithFilter( $filter )
    {
        if (empty($filter)) return null;

        $filter_cached_id = $this->array_hash( $filter );

        if ( array_key_exists( $filter_cached_id, $this->__CACHE )) {
            $xlat = $this->__CACHE[ $filter_cached_id ];
        } else {
            $xlat = $this->mapFilterArray( $filter );
            $this->__CACHE [ $filter_cached_id ] = $xlat;
        }
        return $xlat[ dice(1, count($xlat)-1)    ];
    }

    public function getRandomKey( $array )
    {
        if (empty($array)) return null;
        return $array [ mt_rand(0, count($array)-1 )  ];
    }

    /* DEBUG */
    public function debugCacheStat()
    {
        return "Cache size =  ".count($this->__CACHE).' <br>Content: '.print_r($this->__CACHE, true).']';
    }

}
