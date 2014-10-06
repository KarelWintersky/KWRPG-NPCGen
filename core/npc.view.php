<?
require_once 'core.kwt.php';

/* функции визуализации данных */
class npcView extends kwt {
    public static $ASCIIBarBlank = '_';
    public static $ASCIIBarFilled = 'X';
    public static $bar_pattern = '';

    public static function getAsciiBar($length, $glue='X')
    {
        $s = substr_replace(self::$bar_pattern, str_repeat($glue, $length), 0, $length );
        $s = str_replace(self::$ASCIIBarBlank, '&nbsp;' , $s);
        return $s;
    }

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

?>