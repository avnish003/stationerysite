<?php
/*
# SP Portfolio - Simple Portfolio module by JoomShaper.com
# -------------------------------------------------------------
# Author    JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2018 JoomShaper.com. All Rights Reserved.
# @license - GNU/GPL V2 or Later
# Websites: http://www.joomshaper.com
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

$doc 								= JFactory::getDocument();
$rtl 								= JFactory::getLanguage()->get('rtl');
$direction 							= JRequest::getVar('direction');

if(($direction=='rtl') || ($rtl)) {
	$rtl 							= true;
} else {
	$rtl 							= false;
}

//Basic
$moduleclass_sfx 					= $params->get('moduleclass_sfx');
$moduleName         				= basename(dirname(__FILE__));
$uniqid								= $module->id;
$catid								= $params->get('catid', 'root');
$module_layout						= $params->get('module_layout');
$column								= $params->get('column', 2);
$show_title							= $params->get('show_title');
$linked_title						= $params->get('linked_title');
$show_category						= $params->get('show_category');
$show_url							= $params->get('show_url');
$show_introtext						= $params->get('show_introtext');
$show_readmore						= $params->get('show_readmore');
$ajax_loader						= $params->get('ajax_loader');
$show_filter						= $params->get('show_filter');
$show_title							= $params->get('show_title');
$start								= 0;
$limit								= $params->get('limit', 6);
$ajaxlimit							= $params->get('ajaxlimit', 3);
$ajaxRequest						= false;
$load_jquery						= $params->get('load_jquery');

if( JRequest::getInt('moduleID', 0) > 0 ){
	$start							= JRequest::getInt('start');
	$limit							= JRequest::getInt('limit', $ajaxlimit);
	$ajaxRequest					= true;
}

require_once (dirname(__FILE__).'/helper.php');

$items 								= modSPPortfolioJHelper::getList($params, $start, $limit);
$total  							= modSPPortfolioJHelper::getTotal($params);

$doc->addStylesheet(JURI::base(true) . '/modules/'.$moduleName.'/assets/css/' . $moduleName .'_'.$module_layout.'.css');

if($rtl)
	$doc->addStylesheet(JURI::base(true) . '/modules/'.$moduleName.'/assets/css/slimbox2-rtl.css');
else
	$doc->addStylesheet(JURI::base(true) . '/modules/'.$moduleName.'/assets/css/slimbox2.css');


if( JVERSION >= 3 )
{
	JHtml::_('jquery.framework');
} else {
	if ($load_jquery) $doc->addScript(JURI::base(true) . '/modules/'.$moduleName.'/assets/js/jquery.min.js');	
}

if ($show_filter) $doc->addScript(JURI::base(true) . '/modules/'.$moduleName.'/assets/js/jquery.isotope.min.js');

$doc->addScript(JURI::base(true) . '/modules/'.$moduleName.'/assets/js/slimbox2.js');

require(JModuleHelper::getLayoutPath($moduleName, $module_layout));