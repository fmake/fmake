<?php
namespace fmake\modules\core\fmakeSiteUser;
use fmake\modules\core\fmakeCore\fmakeCore;
class role extends fmakeCore{
	
	public $table = "site_modul_role";
	
	function getRols(){
		$select = $this->dataBase->SelectFromDB(__LINE__);
		return $select -> addFild("id,role") -> addFrom($this->table)->addOrder($this->order) -> addGroup("role") -> queryDB();
	}
	
}