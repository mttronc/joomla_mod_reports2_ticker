<?php

defined('_JEXEC') or die('Illegal Access');

require_once(dirname(__FILE__).DS.'helper.php');

$moduleclass_sfx = $params->get('moduleclass_sfx', '');

$colortext = $params->get('color_text', 'cccccc');
$coloralert = $params->get('color_alert', 'ff0000');
$colorlink = $params->get('colorlink', 'ff0000');
$count = $params->get('count', '5');
$menuNone = $params->get('menu_none', 'No Reports Found');
$selected = $params->get('selected', '1');
$allselected = $params->get('allselected', '1');
$maxchar = $params->get('maxchar', '250');
$readontext = $params->get('readontext', '');
$separator = $params->get('separator', '1');
$separatorcolor = $params->get('separatorcolor', '#333');

$bild = $params->get('bild', '1');
$bild_breite = $params->get('bild_breite', '1');
$bild_float = $params->get('bild_float', '1');

$display['data1'] = $params->get('data1', '1');
$display['address'] = $params->get('address', '0');
$display['date1'] = $params->get('date1', '1');
$display['summary'] = $params->get('summary', '1');
$display['boss'] = $params->get('boss', '0');
$display['desc'] = $params->get('desc', '0');
$display['maxchar'] = $params->get('maxchar', '1');
$display['umbruch'] = $params->get('umbruch', '0');
$display['templatecolor'] = $params->get('templatecolor', '1');
$title['data1'] = 'Einsatzart';
$title['address'] = 'Adresse';
$title['date1'] = 'Alarmierung um';
$title['date2'] = 'Ausfahrt um';
$title['date3'] = 'Einsatzbereitschaft hergestellt';
$title['summary'] = 'Kurzbeschreibung';
$title['boss'] = 'Einsatzleiter';
$title['people'] = 'Mannschaft';


$frontReports = modReports2TickerHelper::getReports($count);
$menu = modReports2TickerHelper::getMenu();
$baseUploadDir = modReports2TickerHelper::getBaseUploadDir();
for($i=0; $i < $count; $i++)
{
	$frontReports[$i]->desc = modReports2TickerHelper::trimDesc($frontReports[$i]->desc, $maxchar);
	$foto[$i] = modReports2TickerHelper::getFoto($frontReports, $i);
	$link[$i] = JRoute::_('index.php?option=com_reports2&Itemid='.$menu->id.'&view=show&id='.$frontReports[$i]->id);
}

require(JModuleHelper::getLayoutPath($module->module));

?>