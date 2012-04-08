<?php

if (!$admin->isLogined())
	die("Доступ запрещен!");


$ignor_delete_security = true;
$globalTemplateParam->set('ignor_delete_security', $ignor_delete_security);

$flag_url = true;

# Поля
$filds = array(
//	 'parent'=>'Родитель',
	 'fio'=>'Имя',
	 'phone'=>'Телефон',
	 'email'=>'Email',
	 'cat_site'=>'Категория',
	 'comment'=>'Коментарий',
	 'date'=>'Дата'
);

$globalTemplateParam->set('filds', $filds);



$absitem = new fmakeOrder();
//$tags = new fmakeSiteModule_tags();	
//$user = new fmakeSiteUser($request->id);

$limit = 10;	
$page = ($request->page)? $request->page : 1;	

	
	$actions = array('active', 'edit', 'delete');
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

				foreach ($_POST as $key=>$value){
					if($key=='comment') $absitem ->addParam($key, mysql_real_escape_string($value));
					else $absitem ->addParam($key, $value);
				}
				$absitem -> newItem();
			break;
		
			case 'update': // Переписать
				foreach ($_POST as $key=>$value){
					if($key=='comment') $absitem ->addParam($key, mysql_real_escape_string($value));
					else $absitem ->addParam($key, $value);
				}
				$absitem -> update();
			break;
		
			case 'delete': // Удалить
				$absitem -> delete();
			break;
			
		}

		$items = $absitem -> getByPage($limit,$page);
		$count = $absitem -> getNumRows();
		$pages = ceil($count/$limit);
		//printAr($items);
		if($items)foreach($items as $key=>$item){
			$items[$key]['date'] = date('H:i d.m.Y',$item['date_creation']);
		}
		
		$globalTemplateParam->set('page', $page);
		$globalTemplateParam->set('pages', $pages);
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
		/*$checkRols = $user->getAccesObj()->arraySimple($user->getAccesObj()->getByModulId($items['id'],"id_role"),"id_role");*/
		// ---------
	case 'new': // Далее форма
		$modules = $absitem -> getAllAsTree();
	
		// для ролей
		/*$rols = $user->getRoleObj()->getAll();
		if(!$checkRols)$checkRols = array();*/
		// ---------
		
		/*$tagsStr = $tags -> tagsToString( $tags -> getTags ($items[$absitem->idField]) );
		$tagsJsStr = $tags -> tagsToJsString( $tags -> getAll () );
		*/
		$content .= '<script type="text/javascript" src="/js/jquery.autocomplete.js"></script>';
	
		$dir = new utlDirectories(ROOT.'/calculating');
		$files = $dir->listing();
		
		$form = new utlFormEngine($modul, "/admin/index.php?modul=".$request->modul, "POST", "multipart/form-data");
	
		$form->addHidden("action", (($_GET['action'] == 'new')?'insert':'update'));
		$form->addHidden("id_genre", $items['id_genre']);
		$form->addHidden("id", $items[$absitem->idField]);

		/*$_modul = $form->addSelect("Родитель", "parent");
				$_modul->AddOption(new selectOption(0, "Нет родителя", (($items['parent']==0)? true : false )));
			if($modules) foreach ($modules as $modul)
			{
				if($modul['id'] == $items['id']) continue;
				$_modul->AddOption(new selectOption($modul['id'], blankprint($modul['level']).$modul['caption'], (($modul['id']==$items['parent'])? true : false )));
			}
		
		$form->AddElement($_modul);*/
		$form->addVarchar("<em>Заголовок</em>", "title", $items["title"]);
		$form->addVarchar("<em>Ключевые</em>", "keywords", $items["keywords"],50,false,"");
		$form->addVarchar("<em>Описание</em>", "description", $items["description"]);
		foreach ($filds as $key=>$fild)
		{
			if($key == 'file') continue;
			$form->addVarchar($fild, $key, (($key == 'date' && $_GET['action'] == 'new')? date("Y-m-d") : $items[$key]));
		}
	
		/*$_file = $form->addSelect("Шаблон", "file");
			$_file->AddOption(new selectOption("", "Нет файла", (($items['file'] == null)? true : false )));
	
		foreach ($files as $file)
		{
			$file = substr($file, 0, strrpos($file, '.'));
			$_file->AddOption(new selectOption($file, $modulNameSpace[$file], (($file == $items['file'])? true : false )));
		}
		$form->AddElement($_file);
		*/
		// для ролей
		//добавляем роли	
		/*$form->addHtml("","<td><b>Доступ к разделу запрещен</b>:</td><td></td>");
		for($j=0;$j<count($rols);$j++){
			$form->addCheckBox("&nbsp;&nbsp;".$rols[$j]['role'],"rols_array[]",$rols[$j]['id'],in_array($rols[$j]['id'],$checkRols));
		}*/
		//--------------
		
		//$form->addTextAreaMini("Теги ( через запятую )", "tags", $tagsStr,1,1);

	
		$form->addFCKEditor("Текст", "text", $items['text']);
		

		$form->addSubmit("save", "Сохранить");
		$content .= $form->printForm();
		
		$content .= '<script type="text/javascript">
			var tags = ['.$tagsJsStr.']
		
			$("#tags").autocomplete(tags , {
				multiple: true,
				mustMatch: false,
				autoFill: true
			});
		</script>';
		if($flag_url){
		$content .='
			<script>
				$("#caption").keyup(function(){
					convert2EN("caption","url");
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
?>
