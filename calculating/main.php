<?php
	
	
	
	$fmakeFilms = new fmakeFilms();
	$fmakeGenres = new fmakeGenres();
	$novinki = $fmakeFilms->getNewsFilmCount(6,true);
	$populars = $fmakeFilms->getPopular(4,true);
	$lastfilms = $fmakeFilms->getLastFilms(4,true);
	//printAr($_COOKIE);
	
	if($novinki){
		foreach($novinki as $key=>$item){
			$fmakeFilmStar = new fmakeFilms_star();
			$summ_star = $fmakeFilmStar->getSummStarFilm($item['id']);
			$count_star = $fmakeFilmStar->getCountStarFilm($item['id']);
			$star_read = $_COOKIE['films'][$item['id']];
			if($count_star) $novinki[$key]['star_count'] = ceil($summ_star/$count_star);
			if($star_read) $novinki[$key]['star_read'] = 1;
			
			$fmakeGenres->setId($item['genre']);
			$item_genre = $fmakeGenres->getInfo();
			$novinki[$key]['genre'] = $item_genre['caption'];
		}
	}
	if($populars){
		foreach($populars as $key=>$item){
			$fmakeFilmStar = new fmakeFilms_star();
			$summ_star = $fmakeFilmStar->getSummStarFilm($item['id']);
			$count_star = $fmakeFilmStar->getCountStarFilm($item['id']);
			$star_read = $_COOKIE['films'][$item['id']];
			if($count_star) $populars[$key]['star_count'] = ceil($summ_star/$count_star);
			if($star_read) $populars[$key]['star_read'] = 1;
			
			$fmakeFilmsGenre = new fmakeFilms_genre();
			$genres = $fmakeFilmsGenre->getTags($item['id']);
			
			$populars[$key]['genres'] = $genres;
			
			$fmakeGenres->setId($item['genre']);
			$item_genre = $fmakeGenres->getInfo();
			$populars[$key]['genre'] = $item_genre['caption'];
		}
	}
	if($lastfilms){
		foreach($lastfilms as $key=>$item){
			$fmakeFilmStar = new fmakeFilms_star();
			$summ_star = $fmakeFilmStar->getSummStarFilm($item['id']);
			$count_star = $fmakeFilmStar->getCountStarFilm($item['id']);
			$star_read = $_COOKIE['films'][$item['id']];
			if($count_star) $lastfilms[$key]['star_count'] = ceil($summ_star/$count_star);
			if($star_read) $lastfilms[$key]['star_read'] = 1;
			
			$fmakeGenres->setId($item['genre']);
			$item_genre = $fmakeGenres->getInfo();
			$lastfilms[$key]['genre'] = $item_genre['caption'];
		}
	}
	//printAr($lastfilms);
	
	$globalTemplateParam->set('novinki', $novinki);
	$globalTemplateParam->set('populars', $populars);
	$globalTemplateParam->set('lastfilms', $lastfilms);
	
	$modul->template = "base/main.tpl";
	
?>