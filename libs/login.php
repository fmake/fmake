<?php
/**
 * залогиневание пользователя
 */

$user = new fmakeSiteUser();
// если был залогинен, то загружаем его данные
$user -> load();


if(!$user->isLogined() && $_COOKIE['email']){
	$email = $request->getEscapeVal( $_COOKIE['c_email'] );
	$autication = $request->getEscapeVal( $_COOKIE['c_autication'] );
	if( $user->loginCokie($email, $autication)){
		//echo "Залогинен через куку";
		$message['login'] = 'Залогинен через куку';
	}
}

//printAr($user->isLogined());

switch ($request->action){

		case 'getpassword':
			$userTmp = $user -> getByEmail($request ->getEscape('email'));
			
			$text = "Ваш пароль: {$userTmp['password']}";
			
			$mail = new PHPMailer();
			$mail->CharSet = "utf-8";//кодировка
			$mail->From = "info@{$hostname}";
			$mail->FromName = $hostname;
			
			$mail->AddAddress($userTmp['email']);
			
			
			$mail->WordWrap = 50;                                 
			$mail->SetLanguage("ru");
		
			$mail->IsHTML(true);
			
			$mail->Subject = "Восстановление пароля {$hostname}";
			$mail->Body    = $text;
			//$mail->AltBody = "Если не поддерживает html";
			
			if(!$mail->Send())
			{
			   //echo "Message could not be sent. <p>";
			   //echo "Mailer Error: " . $mail->ErrorInfo;
			}
			//printAr($userTmp);
			$message['getpassword'] = 'Пароль выслан на почту';
			$globalTemplateParam->set('message', $message);
		break;

		case 'registration':
		
		$userObj = new fmakeSiteUser();
		
		if(!preg_match("#^[a-zA-Z0-9]{5,}$#s", $request ->getEscape('password'))){	
			$error['registration']['password_format'] = "Пароль должен быть длиннее 5 символов, состоять из латинских букв и цифр";
		}
		
		if(!$error['registration']['password_format'] && $request ->getEscape('password') != $request ->getEscape('password2')){
			$error['registration']['password'] = "Пароли не совпадают";
		}
		
		if(!$request ->getEscape('email') || !ereg("^([-a-zA-Z0-9._]+@[-a-zA-Z0-9.]+(\.[-a-zA-Z0-9]+)+)*$", $request ->getEscape('email'))){
			$error['registration']['email_format'] = "Неправильный формат email";
		}
		
		if(!$request ->getEscape('name')){
			$error['registration']['name'] = "Введите имя";
		}
		
		if(!$error['registration']['email_format'] && $userObj->getByEmail($request ->getEscape('email'))){
			$error['registration']['email'] = "Пользователь с таким email уже зарегистрирован";
		}
		
		
		$globalTemplateParam->set('error', $error);
		
		if(!$error['registration']){
			$userObj->addParam("name", $request ->getEscape('name') );
			$userObj->addParam("email", $request ->getEscape('email'));
			$userObj->addParam("password", ($password = $request ->getEscape('password')));
			$autication = $userObj->getAutication( $request ->getEscape('email') );
			$userObj->addParam("autication", $autication);
			$userObj->newItem();
			
			/*
			$tmp = $twig->getLoader();
			$text = $twig->loadTemplate("mail/registration.tpl") -> render(array('autication'=>$autication,'hostname'=>$hostname,'id_user'=>$userObj->id,'password' => $password));
			$twig->setLoader($tmp);
			*/
			
			$mail = new PHPMailer();
			$mail->CharSet = "utf-8";//кодировка
			$mail->From = "info@{$hostname}";
			$mail->FromName = $hostname;
			
			$mail->AddAddress($request ->getEscape('email'));
			
			
			$mail->WordWrap = 50;                                 
			$mail->SetLanguage("ru");
		
			$mail->IsHTML(true);
			
			$mail->Subject = "Подтверждение регистрации {$hostname}";
			$mail->Body    = $text;
			//$mail->AltBody = "Если не поддерживает html";
			
			if(!$mail->Send())
			{
			   echo "Message could not be sent. <p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			}
			
			$registration = true;
			$globalTemplateParam->set('registration', $registration);
		}
		
		//printAr($error);
		
	break;
	case 'login':
		
		// если уже залогинен
		if($user->isLogined()){
			break;
		}
		
		if( $user->login($request->getEscape('email'), $request->password) ){
			
		 	//echo "Вошел";
		 	$message['login'] = 'Вы вошли';
		 	if($request->save){
		 		$cookies = $user -> getAutication($request->email."_cookies");
		 		$user->addParam('cookies', $cookies );
		 		setcookie("c_email", $request->getEscape('email'),time()+3600*24*15,"/");
				setcookie("c_autication", $cookies,time()+3600*24*15,"/");
		 	}
		}else{
			$error['login']['password'] = "Неверный логин - пароль";
			$globalTemplateParam->set('error', $error);
		}
		
		//printAr($message);
		
	break;
	case 'logout':
		
		// если не залогинен
		if(!$user->isLogined()){
			header('Location: /');
			break;
		}
		
		$user->logout();
	  	setcookie("c_email",'',time()-3600*24*60,"/");
		setcookie("c_autication",'',time()-3600*24*60,"/");
		header('Location: /');
		
	break;
}

$globalTemplateParam->set('user',$user);
	