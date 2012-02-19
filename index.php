<?
header('Content-type: text/html; charset=utf-8'); 
setlocale(LC_ALL, 'ru_RU.UTF-8');
mb_internal_encoding('UTF-8');

ini_set('display_errors',1);
//error_reporting(7);
session_start();

require('./fmake/FController.php');

$modul = new fmakeSiteModule();
$modul->getPage($request -> getEscape('modul') ,$twig);
$globalTemplateParam->set('modul',$modul);

//добавляем каталог к основным модулям
$menu = $modul->getAllForMenu(0, true,$q=false,$flag=true,true);
$globalTemplateParam->set('menu',$menu);

$modul->template = "base/main.tpl";

if($modul->file){
	include($modul->file.".php");
} 


$template = $twig->loadTemplate($modul->template);
$template->display($globalTemplateParam->get());

?>