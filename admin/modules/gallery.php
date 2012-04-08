<?php

if (!$admin->isLogined())
	die("Доступ запрещен!");

# Поля
$filds = array(
	 'caption'=>'Название',
	 'redir'=>'Превью'
);

$globalTemplateParam->set('filds', $filds);

	$actions = array('editgallery', 'delete');
	$globalTemplateParam->set('actions', $actions);


$absitem = new fmakeGallery();
$fmakeGalleryImage = new fmakeGallery_Image(); 
$absitem->setId($request->id);
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
				$absitem->deleteNotise();
			break;
			
		}
		$items = $absitem -> getAll();
		$size = sizeof($items);
		for($i=0;$i<$size;$i++){
			$image = $fmakeGalleryImage->getOnePhoto($items[$i][$absitem->idField]);
			$items[$i]['thumb'] = '/'.$fmakeGalleryImage->imgFolder.$items[$i][$absitem->idField].'/thumbs/'.$image['image'];
		}
		
		$globalTemplateParam->set('items', $items);
		global $template; 
		$template = $block;
		include('content.php');
	break;
	case 'edit':
		$items = $absitem -> getInfo();
	case 'new': // Далее форма
		$globalTemplateParam->set('content', $content);
		global $template; 
		$template = $block;
	break;
}	
	
	
//global $template; 
//$template = $block;
