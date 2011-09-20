<?
header('Content-type: text/html; charset=utf-8'); 
setlocale(LC_ALL, 'ru_RU.UTF-8');
mb_internal_encoding('UTF-8');

ini_set('display_errors',1);
error_reporting(7);
session_start();

require('./fmake/FController.php');


$fmakeFilmStar = new fmakeFilms_star();


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

//жанры
$fmakeGenres = new fmakeGenres();
$genresall = $fmakeGenres->getAll(true);
$globalTemplateParam->set('genresall',$genresall);
$globalTemplateParam->set('genres_size',sizeof($genresall));

//опрос
$fmakeInterview = new fmakeInterview();
$interview = $fmakeInterview->getInterview();

if($iscookie = $fmakeInterview->isCookies($interview['id'])){
	//echo('qq');
}
else{
	if($request->active == 'interview'){
		$_fmakeInterview = new fmakeInterview();
		$_fmakeInterview->table = $_fmakeInterview->table_vopros;
		$_fmakeInterview->setId($request->film);
		$interview_item = $_fmakeInterview->getInfo(); 
		$_fmakeInterview->addParam('stat', intval($interview_item['stat'])+1);
		$_fmakeInterview->update();
		setcookie("interview".$interview['id'],1,time()+60*60*24*30,'/',$hostname);
		$iscookie = true;
	}
}

$fmakeInterview->table = $fmakeInterview->table_vopros;
$vopros = $fmakeInterview->getVoproses($interview['id'],true);
$globalTemplateParam->set('interview',$interview);
$globalTemplateParam->set('vopros',$vopros);
$globalTemplateParam->set('iscookie',$iscookie);
//printAr($vopros);

//$modul->addExtension( $catalog = new fmakeCatalog() );
$modul->template = "base/main.tpl";
if($modul->file){
	include($modul->file.".php");
} 


$template = $twig->loadTemplate($modul->template);
$template->display($globalTemplateParam->get());

?>