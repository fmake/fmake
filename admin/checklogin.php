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

	
	$template = $twig->loadTemplate(TEMPLATE_ADM_FOLDER."/login/main.tpl");
	$template->display($globalTemplateParam->get());
	
	exit();
}
?>