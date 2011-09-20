<?php
require_once (ROOT."/fmake/libs/xajax/xajax_core/xajax.inc.php");

	$xajax = new xajax();
	$xajax->configure('decodeUTF8Input',true);
	//$xajax->configure('debug',true);
	$xajax->configure('javascript URI','/fmake/libs/xajax/');
	//$xajax->processRequest();
	$xajax->register(XAJAX_FUNCTION,"addStar");
	$xajax->register(XAJAX_FUNCTION,"clickLinkFilmView");
	
	function addStar($id_film,$star) {
		$objResponse = new xajaxResponse();
		if($_COOKIE['films'][$id_film]!=1){
			setcookie('films['.$id_film.']',1,time()+3600*24*31,'/');
		
			$fmakeFilmStar = new fmakeFilms_star();
			$fmakeFilmStar->addParam('star',$star);
			$fmakeFilmStar->addParam('id_film',$id_film);
			$fmakeFilmStar->newItem();
			return $objResponse;
		}
		else{
			//$objResponse->alert('qq');
			return $objResponse;
		}
	
	}
	function clickLinkFilmView($id_film) {
		$fmakeFilms = new fmakeFilms();
		$fmakeFilms->setId($id_film);
		$item = $fmakeFilms->getInfo();
		$fmakeFilms->addParam('count_viev_player',$item['count_viev_player']+1);
		$fmakeFilms->update(); 
		$objResponse = new xajaxResponse();

		return $objResponse;
	}
	$xajax->processRequest();
	$globalTemplateParam->set('xajax', $xajax);
	
	