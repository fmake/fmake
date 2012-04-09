<?php
include '_testInstall.php';
class testInstall extends _testInstall{
	public $table = "projects";
	public $idField = "id_project";
	public function tpl_test($i){
		return $i;
	}
}