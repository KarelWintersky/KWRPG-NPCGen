<?php
error_reporting(E_ALL & ~E_NOTICE);    ini_set("display_errors", "On");

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once SITE_ROOT . '/engine/websun.php';
require_once SITE_ROOT . '/engine/npc.php';
require_once SITE_ROOT . '/engine/interface.npcFilters.php';
require_once SITE_ROOT . '/engine/npc.Filters.php';

define('USE_TEMPLATE', 'list.york.html');

require_once SITE_ROOT . '/filters/npc.filters.york.php';

$npc_count = 400;

$NPC_List = array();

for ($i = 1; $i <= $npc_count; $i++) {
    $any = new NPC(new npcFiltersYork());
    $NPC_List[] = array_merge( array('index' => $i), $any->getNPC() );
    unset($any);
}

$template_data = array(
    'NPCList'   =>  $NPC_List,
    'MT_Header' =>  npcFiltersYork::$template_header
);

$main_html = websun_parse_template_path($template_data, USE_TEMPLATE, '$/templates');

echo $main_html;

$debug_worktime = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
echo "<small>Render time: {$debug_worktime} sec. </small>";
