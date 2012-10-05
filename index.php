<?php
require('./fmake/FController.php');

$content = new fmakeContent();
$content->getPage($request -> getEscape('modul'));
$globalTemplateParam->set('content',$content);

$menu = $content->getAllForMenu(0, true,$q=false,$flag=true,true);
$globalTemplateParam->set('menu',$menu);

$content->template = 'base/main.tpl';

if($content->file){
	include($content->file.'.php');
} 


$template = $twig->loadTemplate($modul->template);
$template->display($globalTemplateParam->get());
