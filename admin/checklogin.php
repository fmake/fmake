<?

//echo "<pre>"; print_r($_SESSION); echo "</pre>";

$admin = $modulObj->getUserObj();
$admin->load();

//printAr($_REQUEST);

if ($request->action=="logout")
{
	$admin->logout();
	Header ("Location: /");
	exit();
}

if ($request->action=="Login")
{
	//$absAdmin = new fmakeSiteAdministrator();
	if ($row = $admin->login($request->login, $request->password)) 
	{
		
		$admin->setLogin($row['id'], $row['login'], $row['role'], $row['name']); //login($id, $login, $acces)
		Header ("Location: /admin/index.php");
	}else{
		$error = true;
	}         
}

if (!$admin->isLogined()) 
{	   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<title>Venta-Cms</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="/styles/admin/main.css" />
	<link rel="stylesheet" type="text/css" href="/styles/admin/login.css" />
	<meta http-equiv="X-UA-Compatible" content="IE=7" />

	<!--[if lte IE 6]>
		<script type="text/javascript" src="/js/ie6-fix.js"></script>
	<![endif]-->
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="/styles/ie.css" />
	<![endif]-->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>

<body class="bodylogin" >
	<!-- PAGE -->
	<div class="page">
		<div id="login" >
		<form method="post">
			<input type="hidden" name="action" value="Login" />
			<table>
				<tr>
					<td class="f-td" >Логин</td>
					<td><input type="text" name="login" class="text" />  </td>
				</tr>
				<tr>
					<td>Пароль</td>
					<td><input type="password" name="password" class="text" />  </td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="checkbox" name="save" id="save"  /> <label for="save">Запомнить меня</label>
						<button class="action-button f_rt" ><div></div><span>Войти</span>Войти</button>
					</td>
				</tr>
			</table>
			</form>
		</div>
		
	</div><!-- PAGE -->

</body>
</html>
<?  
	exit();
}
?>