<?php
	$limit = 10;
	$page = ($request->page)? $request->getEscape('page') : 1;
	$text = ($request->text_search)? $request->getEscape('text_search') : '';
	
	//printAr($_REQUEST);
	
	$fmakeFilms = new fmakeFilms();
	
	$items = $fmakeFilms->Search($text,$limit,$page,true);
	$fmakeGenres = new fmakeGenres();
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
	
	//if(!$items) $modul->error404();
	//echo($text);
	$count = $fmakeFilms->SearchCount($text,true);
	//echo($count);
	$pages = ceil($count/$limit);
	//echo($pages);
	$globalTemplateParam->set('items',$items);
	$globalTemplateParam->set('page',$page);
	$globalTemplateParam->set('pages',$pages);
	
	$modul->template = "search/main.tpl";				

	
?>