<?php
if (!$admin->isLogined())
	die("Доступ запрещен!");
	
	$absitem = new globalConfigs();
	
	//$configs = $absitem->getSiteConfigs();
	//printAr($configs);
	
	switch($request->action){
		case 'change':
			//echo "qq";
			foreach ($_POST['configs'] as $key=>$value){
				$absitem ->udateByValue($key, $value);
			}
		break;
		case 'new':
			foreach ($_POST as $key=>$value){
				$absitem ->addParam($key, $value);
			}
			$absitem -> newItem();
		break;
	}
	
	
# Поля
	$form = new utlFormEngine($modul, "/admin/index.php?modul=".$request->modul);
	$form->formLegend = "Основные параметры";
	$form->addHidden("action", 'change');
	$form->addVarchar("<em><b>Телефон</b></em>", "configs[phone1]",$configs->phone1,50,false,"Используется на основных страницах сайта и в футере");
	//$form->addVarchar("<em>Телефон(второй)</em>", "configs[phone2]",$configs->phone2,50,false,"Используется на основных страницах сайта и в футере");
	$form->addVarchar("<em><b>Емайл</b></em>", "configs[email]",$configs->email,50,false,"Используется на основных страницах сайта и в футере, а так же для рассылки и оповещения с сайта");
	$form->addVarchar("<em><b>Адрес</b></em>", "configs[adres]",$configs->adres,50,false,"");
	$form->addVarchar("<em><b>Twitter</b></em>", "configs[twitter]",$configs->twitter,50,false,"");
	$form->addVarchar("<em><b>Facebook</b></em>", "configs[facebook]",$configs->facebook,50,false,"");
	$form->addVarchar("<em><b>Vkontakte</b></em>", "configs[vkontakte]",$configs->vkontakte,50,false,"");
	$form->addSubmit("Добавить","Обновить");
	$content = $form->printForm();
	
	
	$form = new utlFormEngine($modul, "/admin/index.php?modul=".$request->modul);
	$form->formLegend = "Текстовые блоки";
	$form->addHidden("action", 'change');
	$form->addTinymce("<em>Футер</em><br />", "configs[footer]",$configs->footer,"Футер");
	
	$form->addSubmit("Добавить","Обновить"); 
	$content .= $form->printForm();
	
	$globalTemplateParam -> set('content', $content);
	global $template;
	$template = "admin/edit/simple_edit.tpl";
?>