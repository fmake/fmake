<?php

	//printAr($_COOKIE);
	if($request->action == 'comments'){
		if($_SESSION['code']!=md5($request->getEscape('capcha'))) $error[] = 'Неправильно введен код';
		if(!$request->getEscape('name')) $error[] = 'Введите имя';
		//if(!$request->getEscape('email') || !ereg("^([-a-zA-Z0-9._]+@[-a-zA-Z0-9.]+(\.[-a-zA-Z0-9]+)+)*$", $request ->getEscape('email'))) $error['email'] = 'Некорректный  email';
		if(!$request->getEscape('text')) $error[] = 'Введите сообщение';
		
		if(!$error){
			$post_id = $request->getEscape('id');
			$fmakeComments = new fmakeComments();
			$fmakeComments->addParam("name",$request->getEscape('name'));
			//$fmakeComments->addParam("email",$request->getEscape('email'));
			$fmakeComments->addParam("text",$request->getEscape('text'));
			$fmakeComments->addParam("film_id",$post_id);
			$fmakeComments->addParam("date",time());
			$fmakeComments->addParam("active",0);
			$fmakeComments->newItem();
			$addcomment = true;
			$globalTemplateParam->set('addcomment',$addcomment);
		}
		$globalTemplateParam->set('error',$error);
		//printAr($error);
	}

	$limit = 10;
	$page = ($request->page)? $request->getEscape('page') : 1;
	$fmakeFilms = new fmakeFilms();
	//echo($request->id);
	switch(1){
		case $request->id!='':
			$fmakeFilms->setId($request->getEscape('id'));
			$item = $fmakeFilms->getInfo();
			$fmakeFilms->addParam('count_view',$item['count_view']+1);
			$fmakeFilms->update(); 
			$image_thumbs = $fmakeFilms->getMiniImage(ROOT.'/images/films/'.$item['id'].'/mini/thumbs/');
			
			$fmakeComments = new fmakeComments();
			$comments = $fmakeComments->getByPage($item['id'],$limit,$page,true);
			$count = $fmakeComments->getByPageCount($item['id'],true); 
			$pages = ceil($count/$limit);
			
			$recomented = $fmakeFilms->getRandFilms(4,true,$item['id']);
			$fmakeFilmsGenre = new fmakeFilms_genre();
			$genres = $fmakeFilmsGenre->getTags($item['id']);
			
			$fmakeFilmStar = new fmakeFilms_star();
			$summ_star = $fmakeFilmStar->getSummStarFilm($item['id']);
			$count_star = $fmakeFilmStar->getCountStarFilm($item['id']);
			$star_read = $_COOKIE['films'][$item['id']];
			if($count_star) $item['star_count'] = ceil($summ_star/$count_star);
			if($star_read) $item['star_read'] = 1;
			//printAr($_COOKIE);
			//printAr($item);
			$id_genre = $item['genre'];
			$fmakeGenres = new fmakeGenres();
			$fmakeGenres->setId($item['genre']);
			$item_genre = $fmakeGenres->getInfo();
			if($item_genre) $breadcrumbs[] = array('caption'=>$item_genre['caption'],'link'=>'/kino/genre-'.$item_genre['id_genre'].'/');
			$breadcrumbs[] = array('caption'=>$item['caption'],'link'=>'');
			
			$item['genre'] = $item_genre['caption'];
			$modul->title = $item['caption'];
			$modul->description = $item['description'];
			$modul->keywords = $item['keywords'];
			//printAr($item);
			$globalTemplateParam->set('item',$item);
			$globalTemplateParam->set('comments',$comments);
			$globalTemplateParam->set('genres',$genres);
			$globalTemplateParam->set('id_genre',$id_genre);
			$globalTemplateParam->set('breadcrumbs',$breadcrumbs);
			$globalTemplateParam->set('recomented',$recomented);
			$globalTemplateParam->set('image_thumbs',$image_thumbs);
			$globalTemplateParam->set('page',$page);
			$globalTemplateParam->set('pages',$pages);
			$modul->template = "kino/item.tpl";
		break;
		case $request->genre!='':
			$items = $fmakeFilms->getByPageGenre($request->getEscape('genre'),$limit,$page,true);
			$fmakeGenres = new fmakeGenres();
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
			//$genres = $fmakeFilmsGenre->getTags($item['id']);
			//if(!$items) $modul->error404();
					
			$count = $fmakeFilms->getByPageGenreCount($request->getEscape('genre'),true);
			
			$fmakeGenres->setId($request->getEscape('genre'));
			$name_genre = $fmakeGenres->getInfo();
			
			
			$pages = ceil($count/$limit);
			$globalTemplateParam->set('items',$items);
			$globalTemplateParam->set('name_genre',$name_genre);
			$globalTemplateParam->set('page',$page);
			$globalTemplateParam->set('pages',$pages);
			
			$modul->template = "kino/main_genre.tpl";				
		break;
		default:
			$items = $fmakeFilms->getByPage($limit,$page,true);
			
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
					
			$count = $fmakeFilms->getByPageCount(true);
			
			$pages = ceil($count/$limit);
			$globalTemplateParam->set('items',$items);
			$globalTemplateParam->set('page',$page);
			$globalTemplateParam->set('pages',$pages);
			
			$modul->template = "kino/main.tpl";				
		break;
	}

	
?>