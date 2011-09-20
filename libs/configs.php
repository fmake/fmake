<?php
	/*
	 * конфигурация всей системы системы
	 */
	define('ROOT', realpath(dirname(__FILE__).'/..'));
	define('REQUEST_SAFETY', false);
	
	
	// регистрация шаблонизатора 
	require_once('pear/PEAR.php');
	require_once('pear/Twig/Autoloader.php');
	Twig_Autoloader::register();
	
	// подключение глобальных функций 
	require 'includes/functions.php';
	// подключение инициализатора объектов 
	require 'objectCreater/objectCreater.php';
	//устанавливаем пути к директории и определяем загрузчик
	objectCreater::setDirPaths();
	
	
	
	

	
	
?>