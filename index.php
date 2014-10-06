<?php
require_once 'core/npc.php';
require_once 'core/npc.view.php';

$flag_debug = 1;
$npc_count = 3;

$main_html = new kwt('/templates/npc.list.tpl.html');

for ($i = 1; $i <= $npc_count; $i++) {
    $any = new NPC();
    $npc_row .= npcView::formatRow($i, $any->getNPC());
}

$main_html->override(array(
    '____npc_list'  => $npc_row
));

$main_html->flush();


?>
<hr>

<?php
if ($flag_debug) echo '<pre>'.print_r( flatten($any->getNPC() ), true ).'</pre>';
?>