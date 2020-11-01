<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once SITE_ROOT . '/engine/websun.php';
require_once SITE_ROOT . '/engine/npc.php';
require_once SITE_ROOT . '/filters/npc.filters.1924.php';

$npc_count = 40;

$NPC_List = array();

for ($i = 1; $i <= $npc_count; $i++) {
    $any = new NPC();
    $NPC_List[] = array_merge( array('index' => $i), $any->getNPC() );
    unset($any);
}

$template_file = 'npc.list.html';
$template_folder = '$/templates';
$template_data = array(
    'NPCList'   =>  $NPC_List,
    'MT_Header' =>  npcFilters::$template_header
);

$main_html = websun_parse_template_path($template_data, $template_file, $template_folder);

echo $main_html;

$debug_worktime = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
echo "<small>Render time: {$debug_worktime} sec. </small>";
