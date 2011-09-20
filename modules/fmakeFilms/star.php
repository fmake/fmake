<?php

	class fmakeFilms_star extends fmakeCore{
		
		public $table = "films_stars";
		
		function getSummStarFilm($id_film){
			$select = $this->dataBase->SelectFromDB(__LINE__);
			$result = $select->addFild("SUM(star)")->addFrom($this->table)->addWhere("id_film = ".$id_film)->queryDB();
			return $result[0]["SUM(star)"];
		}
		
		function getCountStarFilm($id_film){
			$select = $this->dataBase->SelectFromDB(__LINE__);
			$result = $select->addFild("COUNT(*)")->addFrom($this->table)->addWhere("id_film = ".$id_film)->queryDB();
			return $result[0]["COUNT(*)"];
		}
	}
?>