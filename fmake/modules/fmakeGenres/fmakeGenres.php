<?php
class fmakeGenres extends fmakeCore{
	public $idField = "id_genre";
	public $table = "genres";
	public $order = "position";

	
	function getChilds ($id = null, $active = false, $inmenu = false,$type = false){
		//echo('childs '.$type.'<br/>');
		if($id === null)
			$id = $this->id;

		$select = $this->dataBase->SelectFromDB(_LINE_);

		if($active)
			$select -> addWhere("active='1'");
		if($inmenu)
			$select -> addWhere("inmenu='1'");
		if($type){
			$fmakeTypeTable = new fmakeTypeTable();
			$dop_table = $fmakeTypeTable->getTable($type);
			$dop_table_type = ",".$dop_table;
			$select->addWhere($dop_table.".id = ".$this->table.".".$this->idField);
			$this->order = $dop_table.".date";
		}	
		
		return $select -> addFrom($this->table.$dop_table_type) -> addWhere("parent='".$id."'") -> addOrder($this->order) -> queryDB();	
	}		

	function getAllAsTree($parent = 0, $level = 0, $active = false, $inmenu = false,$level_vlojennost = false){
		//$array = array(2,3,4,6);
		if($level != $level_vlojennost || !$level_vlojennost){
			$level++;
			$items = $this -> getChilds($parent, $active, $inmenu);
			//printAr($items);
				if($items){
					foreach ($items as $item){
						//if($item['id'] == 2 || $item['id'] == 3 || $item['id'] == 4 || $item['id'] == 6) continue;
						if($item['delete_security']) continue;
						$item['level'] = $level;
						$this->tree[] = $item;
						$this->getAllAsTree($item[$this->idField], $level, $active, $inmenu,$level_vlojennost);
					}
				}
		}
		return $this->tree;
	}	
	
	function getAllForMenu($parent = 0, $active = false,&$q,&$flag,$inmenu,$acces = false,$level = 0,$level_vlojennost = false,$type = false){
		if($level != $level_vlojennost || !$level_vlojennost){
			//echo($type);
			/*if($type=='stati')
				$items = $this->getChildsStati($parent,$active,$inmenu,$acces,$type);
			elseif ($type == 'news')
				$items = $this->getChildsNews($parent,$active,$inmenu,$acces,$type);
			else*/
				$items = $this->getChilds($parent,$active,$inmenu,$type);
				
			if(!$items)	return;
			foreach ($items as $key => $item) {
					if($items[$key][$this->idField] == $this->id){
						$items[$key]['status'] = true;
						$flag = !$flag;
						$q = true;
					}	
					if($flag)$items[$key]['status'] = &$q;
					if(!$item['delete_security']) $items[$key]['child'] = $this->getAllForMenu($item[$this->idField], $active,$q,$flag,$inmenu,$acces,$level++,$level_vlojennost,$type);
					if($flag)unset($items[$key]['status'] );
			}
		}
		return $items;
	}
}