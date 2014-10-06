<?php
require_once 'npc.randoms.php';

class npcCore {
    public $npc_template = array(
        // базовые данные
        'race'          => '',
        'age'           => 0,
        'sex'           => '',
        // базовые производные
        'color'     => array(
            'eye'   => '',
            'hair'  => '',
            'skin'  => ''
        ),
        // здоровье
        'health'    => array(
            'base'      => 0,
            'vision'    => '',
            'disease'   => '',
            'disabled'  => ''
        ),
        // происхождение
        'origin'        => '',
        'origin_wealth'  => 0, // богатство
        // stats
        'stats' => array(
            'str'   => 0,
            'dex'   => 0,
            'int'   => 0,
            'wpw'  => 0
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

    public function debugCacheStat()
    {
        return "Cache size =  ".count($this->__CACHE).' <br>Content: '.print_r($this->__CACHE, true).']';
    }

    public static function array_hash($array)
    {
        return md5( json_encode($array) );
    }

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

    public function rndWithFilter( $filter )
    {
        $filter_cached_id = $this::array_hash( $filter );

        if ( array_key_exists( $filter_cached_id, $this->__CACHE )) {
            $xlat = $this->__CACHE[ $filter_cached_id ];
        } else {
            $xlat = $this->mapFilterArray( $filter );
            $this->__CACHE [ $filter_cached_id ] = $xlat;
        }
        return $xlat[ dice(1, count($xlat)-1)    ];
    }


}

?>