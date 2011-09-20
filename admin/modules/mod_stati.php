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
//	 'parent'=>'Родитель',
	 'caption'=>'Название',
//	 'text'=>'Текст',
	 //'redir'=>'url',
	 //'file'=>'Шаблон'
);

$globalTemplateParam->set('filds', $filds);

$type = 'stati';


$absitem = new fmakeSiteModule();
//$tags = new fmakeSiteModule_tags();	

$limit = 20;
$page = $request->page ? $request->page : 1;	
$DEFINE_ID_CAT = 70;

	
	$actions = array('move', 'inmenu', 'active', 'delete');
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
				if($request->parent==0){
					$_POST['parent']=$DEFINE_ID_CAT;
				}
				if($_POST['caption']==''){
					$_POST['caption']=$_POST['title'];
				}
				foreach ($_POST as $key=>$value)
					$absitem ->addParam($key, $value);

					
				if($_FILES['image']['tmp_name']){
					$absitem ->addParam("image", $_FILES['image']['name']);
					$absitem -> newItem();
					$absitem->addFile($_FILES['image']['tmp_name'], $_FILES['image']['name']);
				}		
				else{
					$absitem -> newItem();	
				}				
					
				

			
				
				$tmp_item = $absitem->getInfo();
				$fmakeTypeTable = new fmakeTypeTable();
				$fmakeTypeTable->table = $fmakeTypeTable->getTable($type);

				$fmakeTypeTable->setId($request->id);
				$fmakeTypeTable->addParam('id', $tmp_item['id']);
				if($_POST['date']){
					$array = explode('.', $_POST['date']);
					$_date = mktime(0,0,0,intval($array[1]),intval($array[0]),intval($array[2]));
					$fmakeTypeTable->addParam('date',$_date);
				}
				else{
					$fmakeTypeTable->addParam('date', time());
				}
				$fmakeTypeTable->addParam('anotaciya', $_POST['anotaciya']);
				$fmakeTypeTable->addParam('text2', $_POST['text2']);
				
				$fmakeTypeTable->newItem();
				
				
				// теги
				//$tags->addTags($_POST['tags'],$absitem -> id) ;	
				
			break;
		
			case 'update': // Переписать
				foreach ($_POST as $key=>$value)
					$absitem ->addParam($key, $value);
	
				if($_FILES['image']['tmp_name']){
					$absitem ->addParam("image", $_FILES['image']['name']);
					$absitem -> update();
					$absitem->addFile($_FILES['image']['tmp_name'], $_FILES['image']['name']);
				}						
				else{
					$absitem -> update();
				}	
				
				
				
				$tmp_item = $absitem->getInfo();
				$fmakeTypeTable = new fmakeTypeTable();
				$fmakeTypeTable->table = $fmakeTypeTable->getTable($type);

				$fmakeTypeTable->setId($request->id);
				$fmakeTypeTable->addParam('id', $tmp_item['id']);
				if($_POST['date']){
					$array = explode('.', $_POST['date']);
					$_date = mktime(0,0,0,intval($array[1]),intval($array[0]),intval($array[2]));
					$fmakeTypeTable->addParam('date',$_date);
				}
				$fmakeTypeTable->addParam('anotaciya', $_POST['anotaciya']);
				$fmakeTypeTable->addParam('text2', $_POST['text2']);

				$fmakeTypeTable->update();

				
				// теги
				//$tags->addTags($_POST['tags'],$absitem -> id) ;	
			break;
		
			case 'delete': // Удалить
				//$tags->delTagsPage($request->id);
				$absitem -> delete();
			break;
			
		}
		$date_start = false;
		$date_end = false;
		if($request->date_start!=''){
			
			$array = explode('.', $request->date_start);
			$date_start = mktime(0,0,0,intval($array[1]),intval($array[0]),intval($array[2]));
			//echo(date('d.m.Y',$date_start));
		}
		if($request->date_end!=''){
			$array = false;
			$array = explode('.', $request->date_end);
			$date_end = mktime(0,0,0,intval($array[1]),intval($array[0])+1,intval($array[2]));
			//echo(date('d.m.Y',$date_end));
		}
		$items = $absitem ->getAllForMenu($DEFINE_ID_CAT,false,$q=false,$flag=true,false,false,false,false,$type);
		
		$countpage = $absitem->getByPageCount($DEFINE_ID_CAT,$type);
		
		$pages = ceil($countpage/$limit);
		
		$globalTemplateParam->set('items', $items);
		$globalTemplateParam->set('limitOnpage', $limit);
		$globalTemplateParam->set('page', $pages);
		$globalTemplateParam->set('pages', $page);
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
		
		$modules = $absitem -> getChilds($DEFINE_ID_CAT);
		
		//параметры с доп. таблицы
		$fmakeTypeTable = new fmakeTypeTable();
		$fmakeTypeTable->table = $fmakeTypeTable->getTable($type);
		$fmakeTypeTable->setId($request->id);
		$do_items = $fmakeTypeTable->getInfo();
		
		
		//$tagsStr = $tags -> tagsToString( $tags -> getTags ($items[$absitem->idField]) );
		//$tagsJsStr = $tags -> tagsToJsString( $tags -> getAll () );
		
		$content .= '<script type="text/javascript" src="/js/jquery.autocomplete.js"></script>
					<link rel="stylesheet" type="text/css" href="/styles/admin/datepicker.css" />
					<script type="text/javascript" src="/js/datepicker.js"></script>';
	

		
		$form = new utlFormEngine($modul, "/admin/index.php?modul=".$request->modul, "POST", "multipart/form-data");
	
		$form->addHidden("action", (($_GET['action'] == 'new')?'insert':'update'));
		$form->addHidden("id", $items['id']);
		$form->addHidden("file", 'stati');
		if($request->dop_polya){
			$content .= "
			<script type=\"text/javascript\" >			
				$('.no-active').live('click',function(){
					$(this).text('Скрыть доп. поля');
					$(this).removeClass('no-active').addClass('active_d');
					$('#keywords').parent().parent().show();
					$('#description').parent().parent().show();
					$('#caption').parent().parent().show();
					$('#redir').parent().parent().show();
				});
				$('.active_d').live('click',function(){
					$(this).text('Показать доп. поля');
					$(this).removeClass('active_d').addClass('no-active');
					$('#keywords').parent().parent().hide();
					$('#description').parent().parent().hide();
					$('#caption').parent().parent().hide();
					$('#redir').parent().parent().hide();
				});
			</script>";

		$form->addHtml('','<td><a onclick="return false;" class="no-active" href="#">Показать доп. поля</a></td>');
		}
		$_modul = $form->addSelect("<b>Категория</b>", "parent");
				$_modul->AddOption(new selectOption(0, "Нет категории", (($items['parent']==0)? true : false )));
			if($modules) foreach ($modules as $modul)
			{
				if($modul['id'] == $items['id']) continue;
				$_modul->AddOption(new selectOption($modul['id'], blankprint($modul['level']).$modul['caption'], (($modul['id']==$items['parent'])? true : false )));
			}
		
		$form->AddElement($_modul);
		$form->addVarchar("<b>Заголовок</b>", "title", $items["title"]);
		$form->addVarchar("<b>Ключевые</b>", "keywords", $items["keywords"],50,false,"");
		$form->addVarchar("<b>Описание</b>", "description", $items["description"]);
		foreach ($filds as $key=>$fild)
		{
			if($key == 'file') continue;
			$form->addVarchar("<b>".$fild."</b>", $key, (($key == 'date' && $_GET['action'] == 'new')? date("Y-m-d") : $items[$key]));
		}
		$form->addVarchar("<b>url</b>", 'redir',$items['redir']);
		
		
		//$form->addTextAreaMini("<b>Теги ( через запятую )</b>", "tags", $tagsStr,1,1);
		if($items['image']){
			$form->addHtml("",'<tr>
								<td colspain="2">
									<img src="/images/sitemodul_image/'.$items['id'].'/mini'.$items['image'].'">
								</td>
							</tr>');
		}
		$form->addHtml("Загрузить картинку",'<tr>
						<td>
							<b><label id="image-label" for="image">Загрузить картинку</label></b><br>
						</td>
						<td>
							<input type="file" id="image" value="" size="50" name="image">
						</td>
					</tr>');
		$form->addFCKEditor("Текст на главной", "text2", $do_items['text2'],'(короткий текст выводимый на главной<br/> странице сайта с права или внизу картинки)');
		$form->addFCKEditor("Анотация", "anotaciya", $do_items['anotaciya'],'(краткое описание статьи, выводится<br/> в основном списке статей)');
		$form->addFCKEditor("Текст", "text", $items['text'],'(основной полный текст статьи)');
		
		$content .= "
		<script type=\"text/javascript\" >
			$(document).ready(function(){


			$('#filter-date1').DatePicker({
				format:'d.m.Y',
				date: '',
				current: '',
				starts: 1,
				onShow:function() {
					return false;
				},
				onChange:function(dateText) {
				   document.getElementById('filter-date1').value = dateText;
				   $('#filter-date1').DatePickerHide();
				}
				});
				
			});
		</script>		
		";
		
		
		
		if($do_items['date']!=0) $tmp_date = date("d.m.Y",$do_items['date']);
		$form->addHtml('<b>Дата</b>',"<td><b>Дата</b></td><td><input type=\"text\" id=\"filter-date1\" name=\"date\" value=\"".$tmp_date."\"  > <img src=\"/images/vcard_delete.png\" onclick=\"$('#filter-date1').val('');\"  /></td>");
		//$form->addVarchar("Дата", "date", ($do_items['date'])? date('d.m.Y',$do_items['date']) : '');
		//$form->addVarchar("Место", "location", $do_items['location']);
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
?>