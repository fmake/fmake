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
$ignor_delete_security = true;
$globalTemplateParam->set('ignor_delete_security', $ignor_delete_security);

$flag_url = true;

# Поля
$filds = array(
//	 'parent'=>'Родитель',
	 'caption'=>'Название',
	 'genres'=>'Жанры',
	 'add_name'=>'Добавил',
	 'view_count'=>'Просмотров'
);

$globalTemplateParam->set('filds', $filds);

$type = 'stati';


$absitem = new fmakeFilms();
$genres = new fmakeFilms_genre();		

$limit = 20;
$page = $request->page ? $request->page : 1;	
//$DEFINE_ID_CAT = 70;

	
	$actions = array('populyar','inmenu','edit', 'active', 'delete','comments');
	$globalTemplateParam->set('actions', $actions);


$absitem->setId($request->id);
$absitem->tree = false;
//echo($modulObj->getUserObj()->role);
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
	case 'populyar':
	default:
		switch($request->action)
		{
			case 'index':
				$absitem->setIndex();
			break;
			case 'populyar':
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

				if($_POST['date']){
					$array = explode('.', $_POST['date']);
					$absitem->addParam('date', mktime(0,0,0,intval($array[1]),intval($array[0]),intval($array[2]))); 
				}	
				else{
					$absitem->addParam('date', time());
				}
					
				if(!$_POST['populyar']){
					$absitem->addParam('populyar', 0);
				}
				if(!$_POST['inmenu']){
					$absitem->addParam('inmenu', 0);
				}
				if(!$_POST['show_player']){
					$absitem->addParam('show_player', 0);
				}	
				$absitem->addParam('add_name',$modulObj->getUserObj()->login);
				$absitem->newItem();
				
				if($_POST['image']) $absitem->addFile($_POST['image'],'image.jpg');	
				if($_POST['image_mini']) $absitem->addFiles($_POST['image_mini']);
				
				//жанры
				$genres->addTags($_POST['genres'],$absitem -> id) ;
				
			break;
		
			case 'update': // Переписать
				//printAr($_POST);
				foreach ($_POST as $key=>$value)
					$absitem ->addParam($key, $value);
	
				if($_POST['date']){
					$array = explode('.', $_POST['date']);
					$absitem->addParam('date', mktime(0,0,0,intval($array[1]),intval($array[0]),intval($array[2]))); 
				}	
				if(!$_POST['populyar']){
					$absitem->addParam('populyar', 0);
				}
				if(!$_POST['show_player']){
					$absitem->addParam('show_player', 0);
				}	
				$absitem -> update();
				
				if($_POST['image']) $absitem->addFile($_POST['image'],'image.jpg');
				if($_POST['image_mini']) $absitem->addFiles($_POST['image_mini']);
				
				//жанры
				$genres->addTags($_POST['genres'],$absitem -> id) ;
			break;
		
			case 'delete': // Удалить
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
		//$items = $absitem ->getAllForMenu($DEFINE_ID_CAT,false,$q=false,$flag=true,false,false,false,false,$type);
		$items = $absitem->getByPage($limit, $page);
		
		foreach($items as $key=>$item){
		
			$genresStr = $genres -> tagsToString( $genres -> getTags ($item[$absitem->idField]) );
			
			$items[$key]['genres'] = $genresStr;
			$items[$key]['view_count'] = $item['count_view'].'('.$item['count_viev_player'].')';
		}
		
		$countpage = $absitem->getByPageCount();
		
		$pages = ceil($countpage/$limit);
		
		$globalTemplateParam->set('items', $items);
		$globalTemplateParam->set('limitOnpage', $limit);
		$globalTemplateParam->set('page', $page);
		$globalTemplateParam->set('pages', $pages);
		global $template; 
		$template = $block;
		include('content.php');
	break;
	case 'delimg':
		$absitem ->deleteImage();
	case 'mini_delimg':
		$absitem->deleteImageMini($request->nameimg);
	case 'edit':
		$items = $absitem -> getInfo();
		$mini_images = $absitem -> getMiniImage(ROOT.'/images/films/'.$items['id'].'/mini/thumbs/');
		//printAr($mini_images);
		$size_image_mini = sizeof($mini_images);
		for($i=0;$i<$size_image_mini;$i++){
			$str_mini_image .='<div style="position: relative;float:left;padding: 0 5px 5px 0;"><img src="/images/films/'.$items['id'].'/mini/thumbs/'.$mini_images[$i].'"><a href="/admin/?modul='.$request->modul.'&id='.$request->id.'&action=mini_delimg&nameimg='.$mini_images[$i].'"><img src="/images/close.png" style="position: absolute;right: 0;top: -7px;"></a></div>';
		}
		$text_image ='<tr>
						<td><div style="position: relative;"><img src="/images/films/'.$items['id'].'/mini_image.jpg"><a href="/admin/?modul='.$request->modul.'&id='.$request->id.'&action=delimg"><img src="/images/close.png" style="position: absolute;right: -5px;top: -7px;"></a></div></td>
						<td>'.$str_mini_image.'</td>
					</tr>';
	case 'new': // Далее форма
		$fmakeGenres = new fmakeGenres();
		$genresall = $fmakeGenres->getAll(true);
		
		$genresStr = $genres -> tagsToString( $genres -> getTags ($items[$absitem->idField]) );
		$genresJsStr = $genres -> tagsToJsString( $genres -> getAll () );
		
		$content .= '<script type="text/javascript" src="/js/jquery.autocomplete.js"></script>
					<link rel="stylesheet" type="text/css" href="/styles/admin/datepicker.css" />
					<script type="text/javascript" src="/js/datepicker.js"></script>';
	

		
		$form = new utlFormEngine($modul, "/admin/index.php?modul=".$request->modul, "POST", "multipart/form-data");
		
		$form->addHidden("action", (($_GET['action'] == 'new')?'insert':'update'));
		$form->addHidden("id", $items['id']);
		$form->addHidden("file", 'films');
		$form->addHtml("",$text_image);
		$form->addCheckBox("<b>Популярный фильм</b>", "populyar", 1, $items['populyar']);
		$form->addCheckBox("<b>Новинка</b>", "inmenu", 1, $items['inmenu']);
		$form->addVarchar("<b>Название</b>", "caption", $items["caption"]);
		if($items['date']!=0) $tmp_date = date("d.m.Y",$items['date']);
		$form->addHtml('<b>Дата</b>',"<td><b>Дата</b></td><td><input type=\"text\" id=\"filter-date1\" name=\"date\" value=\"".$tmp_date."\"  > <img src=\"/images/vcard_delete.png\" onclick=\"$('#filter-date1').val('');\"  /></td>");
		$form->addFCKEditor("Анонс", "anonse", $items['anonse'],'(анонс)');
		//$form->addVarchar("<b>Год</b>", "year", $items["year"]);
		$_modul = $form->addSelect("Год", "year");
		$_modul->AddOption(new selectOption(0, "Без года", (($items['year']=='')? true : false )));
		
		$start_year = date("Y",time());
		$end_year = 1999;		
		for($i=$start_year;$i>=$end_year;$i--)
		{
			$_modul->AddOption(new selectOption($i,$i, (($i==$items['year'])? true : false )));
		}
		$form->AddElement($_modul);
		//$form->addVarchar("<b>Жанр</b>", "genre", $items["genre"],50,'','(основной)');
		$_modul = $form->addSelect("Жанр", "genre");
				$_modul->AddOption(new selectOption(0, "Без жанра", (($items['genre']==0)? true : false )));
			if($genresall) foreach ($genresall as $gen)
			{
				//if($gen['id_genre'] == $items['id']) continue;
				$_modul->AddOption(new selectOption($gen['id_genre'],$gen['caption'], (($gen['id_genre']==$items['genre'])? true : false )));
			}
		$form->AddElement($_modul);
		$form->addTextAreaMini("Жанры ( через запятую )", "genres", $genresStr,1,1);
		
		$form->addVarchar("<b>Страна</b>", "country", $items["country"]);
		$form->addVarchar("<b>Режиссер</b>", "director",$items['director']);
		$form->addTextArea("<b>В ролях</b>", "v_rolyax",$items['v_rolyax']);
		if($request->action=='edit' && $modulObj->getUserObj()->role>1){
		
		}
		else{
			$form->addTextAreaMini("партнерка (видеоплеер)", "link_partners",$items['link_partners'],100,100,"(Ссылка на партнерку <br/>( адрес, что бы скачать ))");
			$form->addCheckBox("<b>отображать видео плеер</b>", "show_player", 1, $items['show_player']);
			$form->addTextAreaMini("Ссылка на партнера", "url_partners",$items['url_partners'],100,100,"(Ссылка на партнера <br/>(javascript партнерки))");
		}
		
		
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
		
		
		
		
		$form->addVarchar("<b>Картинка</b>", "image","",100,false,"(Большой постер-картинка)");
		$form->addTextArea("<b>Кадры из фильма</b>", "image_mini","",100,100,"(каждая ссылка <br/>с новой строки)");
		$form->addSubmit("save", "Сохранить");
		$content .= $form->printForm();
		
		$content .= '<script type="text/javascript">
			var genres = ['.$genresJsStr.']
		
			$("#genres").autocomplete(genres , {
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