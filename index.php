<?php
require_once 'core/npc.php';
require_once 'core/npc.view.php';
require_once 'core/npc.filters.1924.php';

$flag_debug = 0;

$npc_count = 120;

$time = microtime(true);

$main_html = new kwt('/templates/npc.list.tpl.html');

for ($i = 1; $i <= $npc_count; $i++) {
    $any = new NPC();
    $any_data = $any->getNPC();
    $npc_row .= npcView::formatRow($i, $any_data);
}

$main_html->override(array(
    '____npc_list'      => $npc_row,
    '____time_report'   => round((microtime(true) - $time), 4),
    // '____npc_list_title'=> 'Генератор школоты. Новая Колония, Гиады, Федерация/1 сезон'
    '____npc_list_title'=> ''
));

$main_html->flush();

// debug
$__debug_echo_start = ($flag_debug) ? '<hr><pre>' : "<!--\r\n";
$__debug_echo_separator = ($flag_debug) ? '<hr>' : '----';
$__debug_echo_end = ($flag_debug) ? '</pre>' : '-->';
echo $__debug_echo_start;
print_r( flatten( $any_data ) );
echo $__debug_echo_end;
