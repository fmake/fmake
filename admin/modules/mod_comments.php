<?php
if (!$admin->isLogined())
	die("Доступ запрещен!");

function setGeneralParent($from,$to){
	$from = (int)$from;
	$to = (int)$to;
	$absitem = new fmakeSiteModule();
	
	$absitem->setGeneralParent($from,$to);
		
	$xajax = new xajax();
	$objResponse = new xajaxResponse('utf8');
	return $objResponse->getXML();
}	
	
function setParent($child,$parent){
	$child = (int) $child ;
	$parent = (int) $parent;
	
	$absitem = new fmakeSiteModule();
	$absitem->setParent($child,$parent);
	$xajax = new xajax();
	
	$objResponse = new xajaxResponse('utf8');
	//$objResponse->addScript("alert(".$child.")");
	return $objResponse->getXML();
}



require_once (ROOT."/libs/xajax/xajax_core/xajax.inc.php");
$xajax = new xajax();
$xajax->setCharEncoding('utf8');
//$xajax->debugOn();
$xajax->registerFunction("setGeneralParent");
$xajax->registerFunction("setParent");
$xajax->processRequest();
$globalTemplateParam->set('xajax', $xajax);

$flag_url = true;

# Поля
$filds = array(
	 'name'=>'Ник',
	 //'email'=>'email',
//	 'text'=>'Текст',
	 //'redir'=>'url',
	 //'file'=>'Шаблон'
);

$globalTemplateParam->set('filds', $filds);

$ignor_delete_security = true;
$globalTemplateParam->set('ignor_delete_security', $ignor_delete_security);


$absitem = new fmakeComments();	

$limit = 20;
$page = $request->page ? $request->page : 1;	

	
	$actions = array('active','edit','delete');
	$globalTemplateParam->set('actions', $actions);


$absitem->setId($request->id);
$absitem->tree = false;
# Actions
switch($request->action)
{
	case 'up':
	case 'down':
	case 'insert':
	case 'update':
	case 'delete':
	case 'index':
	case 'inmenu':
	case 'active':
	default:
		switch($request->action)
		{
			case 'index':
				$absitem->setIndex();
			break;

			case 'inmenu':
			case 'active':
				$absitem->setEnum($request->action);
			break;

			case 'up': // Вверх 
				$absitem->getUp();
			break;

			case 'down': // Вниз
				$absitem->getDown();
			break;

			case 'insert': // Новый
				foreach ($_POST as $key=>$value)
					$absitem ->addParam($key, $value);

				$absitem -> newItem();					
					
			break;
		
			case 'update': // Переписать
				foreach ($_POST as $key=>$value)
					$absitem ->addParam($key, $value);
	
				$absitem -> update();
	
			break;
		
			case 'delete': // Удалить
				$absitem -> delete();
			break;
			
		}
		if($request->comm_film_id){
			//echo('qq');
			$fmakeFilms = new fmakeFilms();
			$fmakeFilms->setId($request->getEscape('comm_film_id'));
			$name_film = $fmakeFilms->getInfo();
			$items = $absitem ->getByPage($request->comm_film_id,$limit,$page);
			$countpage = $absitem ->getByPageCount($request->comm_film_id);
			$globalTemplateParam->set('name_film', $name_film);
		}
		else{
			$items = $absitem ->getByPageAll($limit,$page);
			$countpage = $absitem ->getByPageCountAll();
		}
		$pages = ceil($countpage/$limit);
		
		$globalTemplateParam->set('items', $items);
		//$globalTemplateParam->set('limitOnpage', $limit);
		$globalTemplateParam->set('pages', $pages);
		$globalTemplateParam->set('page', $page);
		global $template; 
		$template = $block;
		include('content.php');
	break;
	case 'delimg':
		$absitem -> deleteImage($name = 'icon.png');
	case 'edit':
		$items = $absitem -> getInfo();
		$flag_url = false;
	case 'new': // Далее форма
		

		
		$content .= '<script type="text/javascript" src="/js/jquery.autocomplete.js"></script>
					<link rel="stylesheet" type="text/css" href="/styles/admin/datepicker.css" />
					<script type="text/javascript" src="/js/datepicker.js"></script>';
	

		
		$form = new utlFormEngine($modul, "/admin/index.php?modul=".$request->modul."&comm_film_id=".$items['film_id'], "POST", "multipart/form-data");
	
		$form->addHidden("action", (($_GET['action'] == 'new')?'insert':'update'));
		$form->addHidden("id", $items['id']);

		foreach ($filds as $key=>$fild)
		{
			if($key == 'file') continue;
			$form->addVarchar("<b>".$fild."</b>", $key, (($key == 'date' && $_GET['action'] == 'new')? date("Y-m-d") : $items[$key]));
		}
		$form->addFCKEditor("Текст", 'text',$items['text']);
		
		$form->addSubmit("save", "Сохранить");
		$content .= $form->printForm();
		
		
		
		$globalTemplateParam->set('content', $content);
		$block = "admin/edit/simple_edit.tpl";
		global $template; 
		$template = $block;
	break;
}
?>