<?php
header('Content-type: text/html; charset=utf-8'); 
setlocale(LC_ALL, 'ru_RU.UTF-8');
mb_internal_encoding('UTF-8');
ini_set('display_errors',1);
error_reporting(E_ALL);


require('../fmake/FController.php');


	set_include_path(
		get_include_path().PATH_SEPARATOR
		.ROOT.DIRECTORY_SEPARATOR.'admin'.PATH_SEPARATOR
		.ROOT.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'core'.PATH_SEPARATOR
		.ROOT.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'modules'.PATH_SEPARATOR
		.ROOT.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'includes'.PATH_SEPARATOR
		.ROOT.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'blocks'.PATH_SEPARATOR
		.ROOT.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'classes'.PATH_SEPARATOR
	);

	
	
$modulObj = new fmakeAdminContent();

require_once('checklogin.php');
$mod = $modulObj->getModul( $admin->getRole(),$request->modul);

$globalTemplateParam -> set('admin', $admin);

include 'modulNamespace.php';

$template = "admin/main.tpl";
// Проверка пользователя
//printAr($modulObj->getUserObj());

if(!$mod) {
	$content = "Недоступна для данного типа пользователь: {$modulObj->getUserObj()->login}";
	echo $content;
	exit(); 
}else{

	$block = $mod['template'];	
	if($block){
		$block = "admin/main_template/".$block.".tpl";
	}else{
		$block = "admin/main_template/simple_table.tpl";
	}

	if($mod['file']){
		include($mod['file'].'.php');
	}
	
}


$modulObj->id = $mod['id'];
$menu = $modulObj->_getAllForMenu(0,true,false,$admin->getRole(),$q=false,$flag=true);

$globalTemplateParam->set('block', $block);
$globalTemplateParam->set('mod', $mod);
$globalTemplateParam->set('menu', $menu);
$globalTemplateParam->set('admin', $admin);

$template = $twig->loadTemplate($template);
$template->display($globalTemplateParam->get());
