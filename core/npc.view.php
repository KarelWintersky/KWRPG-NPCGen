<?php
require_once 'core.kwt.php';

/**
 * функции визуализации данных
 */
class npcView extends kwt {
    public static $ASCIIBarBlank = '_';
    public static $ASCIIBarFilled = 'X';
    public static $bar_pattern = '';

    /**
     * @param $length
     * @param string $glue
     * @return mixed
     */
    public static function getAsciiBar($length, $glue='X')
    {
        $s = substr_replace(self::$bar_pattern, str_repeat($glue, $length), 0, $length );
        $s = str_replace(self::$ASCIIBarBlank, '&nbsp;' , $s);
        return $s;
    }

    /**
     * @param $age
     * @param $stats
     * @return array
     */
    public function makeBarsFromAgeAndStats($age, $stats)
    {
        return array(
            'age' => $age,
            'str' => $this->getAsciiBar($stats['str']) . "({$stats['str']})",
            'dex' => $this->getAsciiBar($stats['dex']) . "({$stats['dex']})",
            'int' => $this->getAsciiBar($stats['int']) . "({$stats['int']})",
            'wpw' => $this->getAsciiBar($stats['wpw']) . "({$stats['wpw']})",
        );
    }


    /**
     * @param $i
     * @param $npc
     * @return mixed
     */
    public static function formatRow($i, $npc )
    {
        $html = new kwt('/templates/npc.row.tpl.html', '{%', '%}');

        $html->override( $npc );

        $html->override( array(
            'index' => $i
        ) );
        return $html->get();
    }


}
