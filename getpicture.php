<?php
	/**
	 * получить капчу для формы
	 */
	session_start();
	require('./fmake/FController.php');
	$obj = new generatePicture();
	$obj->genPic();
	$_SESSION['code'] = md5($obj->getLine());