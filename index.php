<?php
require_once 'core/npc.php';

$flag_debug = false;

$any = new NPC();

?>
<pre>
    <?php
    print_r( $any->getNPC() );

    if ($flag_debug) {print_r( $any->debugCacheStat() );}
    ?>
</pre>