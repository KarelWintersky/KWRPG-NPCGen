<?php
require_once 'core/npc.php';
require_once 'core/npc.view.php';

$flag_debug = 1;

$main_html = new kwt('/templates/npc.list.tpl.html');

$any = new NPC();
$npc = $any->getNPC();

$npc_row = npcView::formatRow(1, $npc );

$main_html->override(array(
    '____npc_list'  => $npc_row
));

$main_html->flush();


?>

<hr>
<pre>
    <?php if ($flag_debug) print_r( flatten($npc) ); ?>
</pre>