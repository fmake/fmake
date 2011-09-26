<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<title>{modul.title}</title>
	<meta name="description" content="[[if modul.description]]{modul.description}[[else]]{modul.title}[[endif]]" />
	<meta name="keywords" content="[[if modul.keywords]]{modul.keywords}[[else]]{modul.title}[[endif]]" />
	<link rel="stylesheet" type="text/css" href="/styles/main.css" />
	<meta http-equiv="X-UA-Compatible" content="IE=7" />

	<!--[if lte IE 6]>
		<script type="text/javascript" src="/js/ie6-fix.js"></script>
	<![endif]-->
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="/styles/ie.css" />
	<![endif]-->
	<script language="javascript" type="text/javascript" src="/js/jquery-1.6.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="/js/jquery.MetaData.js"></script>
	<script language="javascript" type="text/javascript" src="/js/jquery.rating.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/jquery.rating.css">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	[[if xajax]]
		[[phpcode`
			$context['xajax']->printJavascript();
		`]]
	[[endif]]
</head>