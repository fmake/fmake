<?php 
	require 'configs.php';
	
	//коннект с базе данных
	$dataBase = new dataBaseController(
						$_SERVER["PHP_SELF"],
						"root",//пользователь
						"sqlroot",//пароль
						"onlite",//имя базы
						"localhost",//сервер
						"",
						"utf8",//кодировка
						"pr"//кодировка
					);
	$log = new dataBaseController_logFile(ROOT."/template/cache/sql.html");				
					
/*
$dataBase = new dataBaseController(
				$_SERVER["PHP_SELF"],
				"root",//пользователь
				"",//пароль
				"mycms",//имя базы
				"localhost",//сервер
				"",
				"utf8",//кодировка
				"pr"//кодировка
			);
*/
	$dataBase->connect(__LINE__);
	
	$hostname = str_replace("www.", "", $_SERVER['HTTP_HOST']);
	$request_url = $_SERVER['REQUEST_URI'];
	//обработчик информации из вне, get, post
	$request = new requestController();
	
	//защита от sql иньекций, если включен защищенный режим
	if(REQUEST_SAFETY){
		$request->allSqlInjectionNone();
	}
	//обработчик сессии
	$session = new sessionController();
	
	
	//глобальные переменные для шаблона
	$globalTemplateParam = new templateController_templateParam();
	//$globalTemplateParam->set('world',$world);
	$globalTemplateParam->set('request', $request);
	$globalTemplateParam->set('hostname', $hostname);
	$globalTemplateParam->set('request_url', $request_url);
	//создаем класс глобальных параметров
	$configs = new globalConfigs();
	$globalTemplateParam->set('configs',$configs);
	//echo $configs->email;

	//$helper = new Tester_helper();
	
	//call_user_func(array('Tester', 'helloworld'), "qq",$array);
	//{$Tester->getItems(3,$arr,$sile);}
?>