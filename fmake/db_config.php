<?php
	/*
	 * Создаем основной класс для соединения с базой данных 
	 */

	//инициализируем объект базы данных 
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

	