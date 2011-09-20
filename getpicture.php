<?
	session_start();
	
	require('libs/FController.php');
	//echo('qq');
	$obj = new utlPicture();
	$obj->genPic();
	$_SESSION['code'] = md5($obj->getLine());
?>