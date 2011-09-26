<?php
	//if($_GET['key']==5502113){
		exit();
		//-----------------------------------------------------

		function get_params($text) {
	
			// год выпуска
			$pattern = "#(год|год выхода|год выпуска)\: ([\d]+)#iu";
			preg_match_all($pattern, $text, $out);
			//printAr($out);
			$ans['year'] = $out[2][0];
			
			
			// страна
			$pattern = "#(страна)\: ([^<]+)#iu";
			preg_match_all($pattern, $text, $out);
			//printAr($out);
			$ans['country'] = $out[2][0];
			
			// режисер
			$pattern = "#(режиссер)\: ([^<]+)#iu";
			preg_match_all($pattern, $text, $out);
			//printAr($out);
			$ans['director'] = $out[2][0];
			
			// в ролях
			$pattern = "#(в ролях|в главных ролях)\: ([^<]+)#iu";
			preg_match_all($pattern, $text, $out);
			//printAr($out);
			$ans['v_rolyax'] = $out[2][0];
			
			
			// текст
			$pattern = "#<p>(.+)</p>#iu";
			preg_match_all($pattern, $text, $out);
			//printAr($out);
			$ans['anonse'] = preg_replace("#Описание:[\s]*#", "", $out[1][0]);
			$pattern = "#<br /><br />([^<]+)#iu";
			preg_match_all($pattern,$ans['anonse'], $out);
			$ans['anonse'] = $out[1][0];
			
			
			// кадры из фильма
			$pattern = "#src=\\\"(.+.jpg)\"#iU";
			preg_match_all($pattern, $text, $out);
			//printAr($out);
			$ans['image_mini'] = join('
			', $out[1]);
			
			return $ans;
		}
		$text8 = "<p>год: 2011<br />страна: США<br />слоган: &laquo;Убей их всех&raquo;<br />режиссер: Валерий Милев<br />сценарий: Майкл Херст<br />продюсер: Кортни Соломон<br />в главных ролях: Скотт Эдкинс, Даниелла Алонсо, Брюс Пэйн, Роджер Р. Кросс, Райчо Василев, Джиллиан Басерсон<br /><br />Учитывая тот факт, что фантастические фильмы ужасов появляются на экранах чуть ли не ежедневно, можно сделать вывод, что именно этот жанр пользуется у зрителей повышенной популярностью. Вот и в этой картине события разворачиваются вокруг небольшой группки солдат, входящих в состав так называемого спецподразделения &laquo;R&raquo;. Их задача &ndash; найти и уничтожить мутантов, оставшихся на нашей планете вследствие страшной эпидемии, превратившей все население в жестоких и бесчувственных зомби. Когда кажется, что все враги уничтожены, бойцы натыкаются на неизвестный вид мутантов, которые научились бороться с людьми и выходить победителями из самых кровавых боев. Удастся ли оставшимся в живых героям уничтожить своих врагов и возобновить свое главенство на Земле?<br /><br /><br />Кадры из фильма:</p>
<p>&nbsp;</p>
<p><img src=\"http://st.kinopoisk.ru/images/kadr/sm_1620347.jpg\" alt=\"\" width=\"170\" height=\"117\" /><img src=\"http://st.kinopoisk.ru/images/kadr/sm_1620346.jpg\" alt=\"\" width=\"170\" height=\"117\" /><img src=\"http://st.kinopoisk.ru/images/kadr/sm_1620345.jpg\" alt=\"\" width=\"170\" height=\"117\" /></p>";


		//printAr(get_params($text8));
		
		//exit();
		//-----------------------------------------------------
		
		
		$fmakeFilmsTable = new fmakeFilmsParser();
		$fmakeFilmsTableDonor = new fmakeFilmsParser();
		//$fmakeFilms_genre = new fmakeFilms_genre();
		//$fmakeFilms_genre->table = $fmakeFilms_genre->table_notice_tags;
		/*$fmakeFilmsTable->table = 'genres';
		$fmakeFilmsTable->order = 'id';
		$fmakeFilmsTable->idField = 'id_genre';
		$fmakeFilmsTableDonor->table = 'dle_category';
		$fmakeFilmsTableDonor->order = 'id';
		$film_all = $fmakeFilmsTableDonor->getAll();
		//printAr($film_all);
		foreach($film_all as $key=>$item){
			$fmakeFilmsTable->setId($item['id']);
			$tmp_film = $fmakeFilmsTable->getInfo();
			
			$fmakeFilmsTable->addParam('id_genre',$item['id']);
			$fmakeFilmsTable->addParam('caption',$item['name']);
			$fmakeFilmsTable->addParam('title',mysql_real_escape_string($item['title']));
			$fmakeFilmsTable->addParam('description',mysql_real_escape_string($item['descr']));
			$fmakeFilmsTable->addParam('keywords',mysql_real_escape_string($item['keywords']));
			$fmakeFilmsTable->addParam('url',$item['alt_name']);
			
			if($tmp_film){
				$fmakeFilmsTable->update();
			}
			else{
				$fmakeFilmsTable->newItem();
			}
		}*/
		$fmakeFilmsTableDonor->table = $fmakeFilmsTableDonor->table_donor;
		//echo('qq');
		$film_all = $fmakeFilmsTableDonor->getAll();
		//printAr($film_all);
		foreach($film_all as $key=>$item){
			//if($key>351){
				$fmakeFilmsTable->setId($item['id']);
				$tmp_film = $fmakeFilmsTable->getInfo();
				preg_match("#(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})#",$item['date'],$date);
				$poster = explode('|',$item['xfields']);//$item['xfields']
				$pos = strpos('t'.$poster[1],"http");
				//preg_match("##",$item['full_story'],$poster);
				//printAr($poster);
				if($pos) $poster_img = $poster[1];
				else $poster_img = 'http://onlite.ws'.$poster[1];
				//exit();
				
				if($item['full_story'])$dop_params = get_params($item['full_story']);
				else $dop_params = get_params($item['short_story']);
				
				$_date = mktime($date[4],$date[5],$date[6],$date[2],intval($date[3]),intval($date[1]));
				$fmakeFilmsTable->addParam('id',$item['id']);
				
				$fmakeFilmsTable->addParam('year',$dop_params['year']);
				$fmakeFilmsTable->addParam('country',mysql_real_escape_string($dop_params['country']));
				$fmakeFilmsTable->addParam('director',mysql_real_escape_string($dop_params['director']));
				$fmakeFilmsTable->addParam('v_rolyax',mysql_real_escape_string($dop_params['v_rolyax']));
				$fmakeFilmsTable->addParam('anonse',mysql_real_escape_string($dop_params['anonse']));
				
				$fmakeFilmsTable->addParam('title',$item['metatitle']);
				$fmakeFilmsTable->addParam('add_name',$item['autor']);
				$fmakeFilmsTable->addParam('genre',$item['category']);
				$fmakeFilmsTable->addParam('date',$_date);
				$fmakeFilmsTable->addParam('caption',mysql_real_escape_string($item['title']));
				$fmakeFilmsTable->addParam('description',mysql_real_escape_string($item['descr']));
				$fmakeFilmsTable->addParam('keywords',mysql_real_escape_string($item['keywords']));
				$fmakeFilmsTable->addParam('url',$item['alt_name']);
				if($tmp_film){
					$fmakeFilmsTable->update();
				}
				else{
					$fmakeFilmsTable->newItem();
				}
				//$fmakeFilms_genre->addParam('id_genre',$item['category']);
				//$fmakeFilms_genre->addParam('id_film',$item['id']);
				//$fmakeFilms_genre->newItem();
				$fmakeFilmsTable->addFiles($dop_params['image_mini']);
				//if($poster[1] && !is_file(ROOT."/images/films/".$item['id']."/image.jpg")) $fmakeFilmsTable->addFile($poster_img,'image.jpg');
				echo('загружен : '.$item['id'].' key = '.$key.'<br>');
				//$fmakeFilmsTable
			//}
		}
		
		//echo('qq');
		$modul->template = "kino/main.tpl";	
	//}
