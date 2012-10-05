<?php
	/**
	 * значения статусов
	 */
	/*
	 * опубликована
	 */
	define('CONTENT_PUBLICATE', 2);	
	/*
	 * стартовая страница
	*/
	define('CONTENT_MAIN', 2);
	/*
	 * опубликована в основном меню
	*/
	define('CONTENT_MENU', 2);

	class fmakeSiteModule_status extends fmakeCore{
		public $idField = "id_content_status";
		public $table = "content_status";
		
	}
