<?
header('Content-type: text/html; charset=utf-8'); 
setlocale(LC_ALL, 'ru_RU.UTF-8');
mb_internal_encoding('UTF-8');

ini_set('display_errors',1);
error_reporting(7);
session_start();

require('./fmake/FController.php');


//К нам заходят по фразам
$search = new SearchSystem();
$array_search = $search -> getSearchSystem ( $_SERVER['HTTP_REFERER'] ) ;

if($array_search){
	$search->addParam('search_num', $array_search['search_num']);
	$search->addParam('query', $array_search['query']);
	$search->addParam('url', $_SERVER['REQUEST_URI']);
	$search->newItem();
}
$search_query = $search->getItems();

$globalTemplateParam->set('search_query',$search_query);

$modul = new fmakeSiteModule();


$modul->getPage($request -> getEscape('modul') ,$twig);

$globalTemplateParam->set('modul',$modul);

//добавляем каталог к основным модулям
$menu = $modul->getAllForMenu(0, true,$q=false,$flag=true,true);

$globalTemplateParam->set('menu',$menu);	



//$modul->addExtension( $catalog = new fmakeCatalog() );
$modul->template = "base/main.tpl";
if($modul->file){
	include($modul->file.".php");
} 


$template = $twig->loadTemplate($modul->template);
$template->display($globalTemplateParam->get());

?>