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

$xajax = new xajax();
$xajax->setCharEncoding('utf8');
//$xajax->debugOn();
//$xajax->configure('debug',true);
$xajax->registerFunction("setGeneralParent");
$xajax->registerFunction("setParent");
$xajax->processRequest();
$globalTemplateParam->set('xajax', $xajax);

$flag_url = true;

# Поля
$filds = array(
//	 'parent'=>'Родитель',
	 'caption'=>'Название',
//	 'text'=>'Текст',
	 'redir'=>'url',
	 'file'=>'Шаблон'
);

$globalTemplateParam->set('filds', $filds);



$absitem = new fmakeContent();

	
	

	
	$actions = array('move', 'index', 'inmenu', 'active', 'edit', 'delete');
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
				if($_POST['caption']==''){
					$_POST['caption']=$_POST['title'];
				}
				foreach ($_POST as $key=>$value){
					if($key=='text') $absitem ->addParam($key, mysql_real_escape_string($value));
					else $absitem ->addParam($key, $value);
				}
				$absitem -> newItem();
			break;
		
			case 'update': // Переписать
				$tmp_item = $absitem->getInfo();
				foreach ($_POST as $key=>$value){
					if($key=='text') $absitem ->addParam($key, mysql_real_escape_string($value));
					else $absitem ->addParam($key, $value);
				}
				$absitem -> update();
				
			break;
		
			case 'delete': // Удалить
				$items = $absitem->getInfo();
				$absitem->DeleteUrlXml('http://'.$hostname.'/'.$items['redir'].'/');
				$absitem -> delete();
			break;
			
		}

		$items = $absitem -> getAllForMenu(0,false,$q=false,$flag=true,false);
		
		//for($i=0;$i<count($items);$i++){
		//	$items[$i]['file'] = $modulNameSpace[$items[$i]['file']];
		//}
		
		//printAr($items);
		
		$globalTemplateParam->set('items', $items);
		global $template; 
		$template = $block;
		include('content.php');
	break;
	case 'delimg':
		$absitem -> deleteImage($name = 'icon.png');
	case 'edit':
		$items = $absitem -> getInfo();
		$flag_url = false;
		// для ролей
		//$checkRols = $user->getAccesObj()->arraySimple($user->getAccesObj()->getByModulId($items['id'],"id_role"),"id_role");
		// ---------
	case 'new': // Далее форма
		$modules = $absitem -> getAllAsTree();
	
		// для ролей
		//$rols = $user->getRoleObj()->getAll();
		//if(!$checkRols)$checkRols = array();
		// ---------
	
		
		$content .= '<script type="text/javascript" src="/js/jquery.autocomplete.js"></script>';
	
		$dir = new utlDirectories(ROOT.'/calculating');
		$files = $dir->listing();
		
		$form = new utlFormEngine($modul, "/admin/index.php?modul=".$request->modul, "POST", "multipart/form-data");
	
		$form->addHidden("action", (($_GET['action'] == 'new')?'insert':'update'));
		$form->addHidden("id", $items['id']);
		if($request->dop_polya){
			$content .= "
			<script type=\"text/javascript\" >			
				$('.no-active').live('click',function(){
					$(this).text('Скрыть доп. поля');
					$(this).removeClass('no-active').addClass('active_d');
					//$('#title').parent().parent().show();
					$('#keywords').parent().parent().show();
					$('#description').parent().parent().show();
					$('#caption').parent().parent().show();
					$('#redir').parent().parent().show();
					//$('#tags').parent().parent().show();
				});
				$('.active_d').live('click',function(){
					$(this).text('Показать доп. поля');
					$(this).removeClass('active_d').addClass('no-active');
					//$('#title').parent().parent().hide();
					$('#keywords').parent().parent().hide();
					$('#description').parent().parent().hide();
					$('#caption').parent().parent().hide();
					$('#redir').parent().parent().hide();
					//$('#tags').parent().parent().hide();
				});
			</script>";

		$form->addHtml('','<td><a onclick="return false;" class="no-active" href="#">Показать доп. поля</a></td>');
		}
		$_modul = $form->addSelect("Родитель", "parent");
				$_modul->AddOption(new selectOption(0, "Нет родителя", (($items['parent']==0)? true : false )));
			if($modules) foreach ($modules as $modul)
			{
				if($modul['id'] == $items['id']) continue;
				$_modul->AddOption(new selectOption($modul['id'], blankprint($modul['level']).$modul['caption'], (($modul['id']==$items['parent'])? true : false )));
			}
		
		$form->AddElement($_modul);
		$form->addVarchar("<em>Заголовок</em>", "title", $items["title"]);
		$form->addVarchar("<em>Ключевые</em>", "keywords", $items["keywords"],50,false,"");
		$form->addVarchar("<em>Описание</em>", "description", $items["description"]);
		foreach ($filds as $key=>$fild)
		{
			if($key == 'file') continue;
			$form->addVarchar($fild, $key, (($key == 'date' && $_GET['action'] == 'new')? date("Y-m-d") : $items[$key]));
		}
	
		$_file = $form->addSelect("Шаблон", "file");
			$_file->AddOption(new selectOption("", "Нет файла", (($items['file'] == null)? true : false )));
	
		foreach ($files as $file)
		{
			$file = substr($file, 0, strrpos($file, '.'));
			$_file->AddOption(new selectOption($file, $modulNameSpace[$file], (($file == $items['file'])? true : false )));
		}
		$form->AddElement($_file);
		
		
		//$form->addFCKEditor("Текст", "text", $items['text']);
		$form->addTinymce("Текст", "text", $items['text']);
		

		$form->addSubmit("save", "Сохранить");
		$content .= $form->printForm();
		
		
		if($flag_url){
		$content .='
			<script>
				$("#title").keyup(function(){
					convert2EN("title","redir");
				});
			</script>
		';
		}
		$globalTemplateParam->set('content', $content);
		$block = "admin/edit/simple_edit.tpl";
		global $template; 
		$template = $block;
	break;
}