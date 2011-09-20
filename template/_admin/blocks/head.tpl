<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru-ru" xml:lang="ru-ru">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Language" content="ru-ru" />
<meta http-equiv="imagetoolbar" content="no" />

<title>Центр администрирования</title>

<link href="/styles/admin.css" rel="stylesheet" type="text/css" media="screen" />
<script>

var menu_state = 'shown';

function makeStripy(tabClass) 
{
   var tabs = document.getElementsByTagName("table");
   for (var e = 0; e < tabs.length; e++){ 
      if (tabs[e].className == tabClass) 
      {
         var rows = tabs[e].getElementsByTagName("tr");
         for (var i = 0; i < rows.length; i++) // строки нумеруются с 0
            rows[i].className += ((i % 2) == 0 ? " oddrows" : " evenrows");
      }
    }
}

function switch_menu()
{
	var menu = document.getElementById('menu');
	var main = document.getElementById('main');
	var toggle = document.getElementById('toggle');
	var handle = document.getElementById('toggle-handle');

	switch (menu_state)
	{
		// hide
		case 'shown':
			main.style.width = '93%';
			menu_state = 'hidden';
			menu.style.display = 'none';
			toggle.style.width = '20px';
			handle.style.backgroundImage = 'url(/images/admin/toggle.gif)';
			handle.style.backgroundRepeat = 'no-repeat';

			
				handle.style.backgroundPosition = '100% 50%';
				toggle.style.left = '0';
			
		break;

		// show
		case 'hidden':
			main.style.width = '76%';
			menu_state = 'shown';
			menu.style.display = 'block';
			toggle.style.width = '5%';
			handle.style.backgroundImage = 'url(/images/admin/toggle.gif)';
			handle.style.backgroundRepeat = 'no-repeat';

			
				handle.style.backgroundPosition = '0% 50%';
				toggle.style.left = '15%';
			
		break;
	}
}


</script>

</head>
