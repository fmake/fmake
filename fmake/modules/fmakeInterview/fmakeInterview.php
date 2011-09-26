<?php
	class fmakeInterview extends fmakeCore{
		
		public $table = "interview";
		public $table_vopros = "interview_vopros";
		public $order = "position";
		
		function getVoproses($id_interview,$active = false) {
			$select = $this->dataBase->SelectFromDB(__LINE__);
			if($id_interview){
				$select->addWhere('id_interview = '.$id_interview);
			}
			if($active){
				$select->addWhere("active = '1'");
			}
			return $select->addFrom($this->table_vopros)->queryDB();
		}
		
		function getInterview() {
			$select = $this->dataBase->SelectFromDB(__LINE__);
			$result = $select->addFrom($this->table)->addWhere("active = '1'")->addLimit(0, 1)->queryDB();
			return $result[0];
		}
		
		function isCookies($id_interview){
			if($_COOKIE['interview'.$id_interview]){
				return true;
			}
			else{
				return false;
			}
		}
	}