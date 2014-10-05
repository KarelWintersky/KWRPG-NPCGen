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
        'origin_value'  => 0,
        // stats
        'stats' => array(
            'str'   => 0,
            'dex'   => 0,
            'int'   => 0,
            'wpw'  => 0
        ),
        'tests' => array(
            'savvy'         => 0, // смекалка
            'memory'        => 0, // способность к запоминанию информации
            'even_tempered' => 0, // уживчивость
            'curiosity'     => 0, // Любознательность
            'sporty'        => 0, // спортивность
        ),
        'psi'   => array( // психические показатели
            'aggro'         => 0,
            'leadership'    => 0
        )
    );

    public $__CACHE = array();

    public static function array_hash($array)
    {
        return md5( json_encode($array) );
    }


    public function mapFilterArray( $filter )
    {
        $xlat = array( 0 => '');
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