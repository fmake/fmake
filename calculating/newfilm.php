<?php

	//printAr($_COOKIE);
	if($request->action == 'comments'){
		
		if(!$request->getEscape('name')) $error['name'] = 'Введите ник';
		//if(!$request->getEscape('email') || !ereg("^([-a-zA-Z0-9._]+@[-a-zA-Z0-9.]+(\.[-a-zA-Z0-9]+)+)*$", $request ->getEscape('email'))) $error['email'] = 'Некорректный email';
		if(!$request->getEscape('text')) $error['text'] = 'Введите сообщение';
		
		if(!$error){
			$fmakeSiteModul = new fmakeSiteModule();
			$fmakeSiteModul->setRedir($request->getEscape('url'));
			$post = $fmakeSiteModul->getInfo();
			$post_id = $post['id'];
			$fmakeComments = new fmakeComments();
			$fmakeComments->addParam("name",$request->getEscape('name'));
			//$fmakeComments->addParam("email",$request->getEscape('email'));
			$fmakeComments->addParam("text",$request->getEscape('text'));
			$fmakeComments->addParam("film_id",$post_id);
			$fmakeComments->addParam("date",time());
			$fmakeComments->addParam("active",0);
			$fmakeComments->newItem();
		}
		$globalTemplateParam->set('error',$error);
	}

	$limit = 10;
	$page = ($request->page)? $request->getEscape('page') : 1;
	$fmakeFilms = new fmakeFilms();
	//echo($request->id);
	
	$items = $fmakeFilms->getByPageNew($limit,$page,true);
	
	$fmakeFilmsGenre = new fmakeFilms_genre();
	if($items){
		foreach($items as $key=>$item){
			$genres = $fmakeFilmsGenre->getTags($item['id']);
			$items[$key]['genres'] = $genres;
			$fmakeFilmStar = new fmakeFilms_star();
			$summ_star = $fmakeFilmStar->getSummStarFilm($item['id']);
			$count_star = $fmakeFilmStar->getCountStarFilm($item['id']);
			$star_read = $_COOKIE['films'][$item['id']];
			if($count_star) $items[$key]['star_count'] = ceil($summ_star/$count_star);
			if($star_read) $items[$key]['star_read'] = 1;
			
			$fmakeGenres->setId($item['genre']);
			$item_genre = $fmakeGenres->getInfo();
			$items[$key]['genre'] = $item_genre['caption'];
		}
	}
	if(!$items) $modul->error404();
			
	$count = $fmakeFilms->getByPageCountNew(true);
	
	$pages = ceil($count/$limit);
	$globalTemplateParam->set('items',$items);
	$globalTemplateParam->set('page',$page);
	$globalTemplateParam->set('pages',$pages);
	
	$modul->template = "kino/main_newfilm.tpl";				

	
?>