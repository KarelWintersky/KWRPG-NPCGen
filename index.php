<?php
require_once 'core/npc.php';
require_once 'core/npc.view.php';

$flag_debug = 0;

$main_html = new kwt('/templates/npc.list.tpl.html');

$any = new NPC();
$npc = $any->getNPC();

$npc_row = npcView::formatRow(1, $npc );

print_r( $npc );

$main_html->override(array(
    '____npc_list'  => $npc_row
));

$main_html->flush();


?>