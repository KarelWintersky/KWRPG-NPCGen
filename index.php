<?php
require_once 'core/npc.php';

$any = new NPC();

?>
<pre>
    <?php
    print_r( $any->getNPC() );
    ?>
</pre>