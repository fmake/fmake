<?php 
	require 'configs.php';
	
 
	//загружаем шаблонизатор	
	$loader = new Twig_Loader_Filesystem(ROOT.'/template');
	$twig = new Twig_Environment($loader,array('auto_reload' => true ,'cache' => ROOT.'/template/cache', 'debug' => false));
	$lexer = new Twig_Lexer($twig, array('tag_comment' => array('/*', '*/'),'tag_block'  => array('[[', ']]'),'tag_variable' => array('{', '}'),));
	$twig->setLexer($lexer);
	$twig->addExtension(new Twig_Project_Extension());
	
	require 'db_config.php';
	// лог запросов
	$log = new dataBaseController_logFile(ROOT."/template/cache/sql.html", false);	
	$dataBase -> addLog($log);			
	// делаем коннект к базе данных
	$dataBase->connect(__LINE__);
	 
	$hostname = str_replace("www.", "", $_SERVER['HTTP_HOST']);

	//обработчик информации из вне, get, post
	$request = new requestController();
	
	//защита от sql иньекций, если включен защищенный режим
	if(REQUEST_SAFETY){
		$request->allSqlInjectionNone();
	}
	//обработчик сессии
	$session = new sessionController();
	//создаем класс глобальных параметров
	$configs = new globalConfigs();
	
	//глобальные переменные для шаблона
	$globalTemplateParam = new templateController_templateParam();
	$globalTemplateParam->set('request', $request);
	$globalTemplateParam->set('hostname', $hostname);
	$globalTemplateParam->set('request_url', $request_url);
	$globalTemplateParam->set('configs',$configs);
	

?>