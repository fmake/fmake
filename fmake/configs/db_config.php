<?php
	/**
	 * Создаем основной класс для соединения с базой данных 
	 */ 
	$dataBase = new dataBaseController(
						$_SERVER["PHP_SELF"],
						"root",//пользователь
						"",//пароль
						"fmake",//имя базы 
						"localhost",//сервер
						"",
						"utf8",//кодировка
						"pr"//кодировка
					);

	