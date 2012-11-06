<?php
namespace fmake\modules\core\fmakeContent;
use fmake\modules\core\fmakeCore\fmakeCore;
/**
 * 
 * Основной контент сайта
 * @author n1k
 *
 */
class fmakeContent extends fmakeCore{
		
	public $table = "content";
	public $setName = "";
	public $idField = "id_content";
	/**
	 * 
	 * Расширения контекта другими классами
	 * @var ArrayObject fmakeSiteModule_ExtensionInterface 
	 */
	protected $extensions; 	
	public $order = "position";
	public $tree = array();
	
	
	public function __isset($key){
 		return isset($this->params[$key]);
  	}
	
	function __get($nm){
		return $this->__isset($nm) ? $this->params[$nm] : false;
	}

	/**
	 * 
	 * получить id текущей записи
	 */
	function getId(){
		return $this->__get($this->idField);
	}
	
	/**
	 * 
	 * Получить всех детей родилетя
	 * @param int $id родителя
	 * @param int $active учитывать включена ли страница
	 * @param int $inmenu включена ли в меню
	 */
	function getChilds ($id_content = false, $active = false, $inmenu = false){
		if($id_content === false){
			$id_content = $this->getId();
		}
			
		$select = $this->dataBase->SelectFromDB(__LINE__);

		if($active){
			$select -> addWhere("active='1'");
		}
		
		if($inmenu){
			$select -> addWhere("inmenu='1'");
		}
		
		return $select -> addFrom($this->table) -> addWhere("id_parent='".$id_content."'") -> addOrder($this->order) -> queryDB();	
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
						$this->getAllAsTree($item['id'], $level, $active, $inmenu,$level_vlojennost);
					}
				}
		}
		return $this->tree;
	}
	
	function getAllForMenu($parent = 0, $active = false,&$q,&$flag,$inmenu,$acces = false,$level = 0,$nestingLevel = 2,$type = false){
		if($level != $nestingLevel || !$nestingLevel){
			$items = $this->getChilds($parent,$active,$inmenu,$type);
			if(!$items)	return;
			foreach ($items as $key => $item) {
					if($items[$key][$this->idField] == $this->getId() && $this->setName == $this->getName()){
						$items[$key]['status'] = true;
						$flag = !$flag;
						$q = true;
					}	
					if($flag)$items[$key]['status'] = &$q;
					$items[$key]['child'] = $this->getAllForMenu($item[$this->idField], $active,$q,$flag,$inmenu,$acces,$level++,$nestingLevel,$type);
					if($flag)unset($items[$key]['status'] );
			}
		}
		return $items;
	}
	
	/**
	 * 
	 * Получить запись по url
	 * @param $url
	 */
	function getItem($url){
		
		$where = array();
		if($url){
			$where[sizeof($where)] = "`url` = '".$url."'";
		}else{
			$where[sizeof($where)] = "`index` = '1'";
		}	
		
		$arr = $this->getWhere($where);
		
		if($arr[0]){
			foreach($arr[0] as $key => $mod){
				$this->addParam($key, $mod);
			}
		}
		return $arr;
			
	}
	/**
	 * 
	 * 404 ошибка
	 */
	function error404(){
		global $globalTemplateParam,$twig;
		HttpError(404);
		$template = $twig->loadTemplate('404.tpl');
		$template->display($globalTemplateParam->get());
		exit();
	}	
	
	/**
	 * 
	 * получить страницу по адресу
	 * @param  $url
	 * @param  $twig
	 */
	function getPage($url){
		
		$this->getItem($url);
		
		/**
		 * если нет страницы в текущем классе, ищем в классах расширениях
		 */
		if(!$this->getId() && $this->extensions){
			foreach ($this->extensions as $name=>&$obj){
				if($obj->getItem($url)){
					$this->params = $obj->params;
					$this->setName = $name;
					break;
				}
			}
		}else{
			$this->setName = $this->getName();
		}
		/**
		 * не нашли страницу по адресу, вызываем 404 ошибку
		 */
		if(!$this->getId()){
			$this -> error404();
		}
	}
	/**
	 * 
	 * Добавления класса расширения контента
	 * @param fmakeSiteModule_ExtensionInterface $extension
	 */
    function addExtension(fmakeSiteModule_ExtensionInterface $extension){
    
        $this->extensions[$extension->getName()] = $extension;
       
    }
    
	function getUp (){
		
		$order = $this->getInfo();
		$select = $this->dataBase->SelectFromDB( __LINE__);
		$arr = $select -> addFrom($this->table)-> addWhere("`id_parent` = '{$order['id_parent']}' ")  -> addWhere("`position` < '{$order['position']}' ") -> addOrder('position', 'DESC')  -> addLimit(0, 1) -> queryDB();
		$arr = $arr[0];
		
		if($arr)
		{
			$update = $this->dataBase->UpdateDB( __LINE__);
			$update	-> addTable($this->table) -> addFild("`position`", $order['position']) -> addWhere("`".$this->idField."` = '".$arr['id']."'") -> queryDB();
			$update	-> addTable($this->table) -> addFild("`position`", $arr['position']) -> addWhere("`".$this->idField."` = '".$this->id."'") -> queryDB();
		}
	}
	
	function getDown (){
		
		$order = $this->getInfo();
		$select = $this->dataBase->SelectFromDB( __LINE__);
		$arr = $select -> addFrom($this->table)-> addWhere("`id_parent` = '{$order['id_parent']}' ") -> addWhere("`position` > '{$order['position']}' ") -> addOrder('position', 'ASC')  -> addLimit(0, 1) -> queryDB();
		$arr = $arr[0];

		if($arr){
			
			$update = $this->dataBase->UpdateDB( __LINE__);			
			$update	-> addTable($this->table) -> addFild("`position`", $order['position']) -> addWhere("`id` = '".$arr['id']."'") -> queryDB();
			$update	-> addTable($this->table) -> addFild("`position`", $arr['position']) -> addWhere("`id` = '".$this->id."'") -> queryDB();
			
		}
	}
    /**
     * делаем две записи на одном уровне, устонавливает позицуии
     */
    function setGeneralParent($from,$to){
		$this->setId($to);
		$info = $this->getInfo();
		// добавляем объект в дерево
		$this->setId($from);
		$this->addParam("id_parent", $info['id_parent']);
		$this->update();		
		$select = $this->dataBase->SelectFromDB( __LINE__);
		$arr = $select->addFild("id") -> addFrom($this->table)->addWhere("`id_parent` = '".$info['id_parent']."' ") -> addOrder('position', 'ASC') -> queryDB();
		$fromNum = 0;
		$toNum = 0;
		for($i=0;$i<sizeof($arr);$i++){
			if($fromNum && $toNum)
				break;
			
			if($arr[$i]['id']==$from){
				$fromNum = $i+1;
			}else if($arr[$i]['id']==$to){
				$toNum = $i+1;
			}
		}
		$action = $fromNum - $toNum - 1; // -1 так как они должны быть друг под другом
		$this->setId($from);
		while($action > 0){
			$this->getUp();
			$action--;
		}
    	while($action < 0){
			$this->getDown();
    		$action++;
		}

    }
    /**
     * выставляем родителя и делаем самой последней
     */
    function setParent($child,$parent){
    	$this->setId($child);
		$this->addParam("id_parent", $parent);
		$this->update();
		
		$select = $this->dataBase->SelectFromDB( __LINE__);
		$arr = $select->addFild("id") -> addFrom($this->table)->addWhere("`id_parent` = '".$info['id_parent']."' ") -> addOrder('position', 'ASC') -> queryDB();
		$childNum = 0;
		for($i=0;$i<sizeof($arr);$i++){
			if($arr[$i]['id'] == $child){
				$childNum = $i;
				break;
			}
		}
		
		$action = sizeof($arr) - $childNum;
		
		$this->setId($child);
    	while($action > 0){
			$this->getDown();
    		$action--;
		}
		
		
    }
    /**
     * 
     * Имя класса, для определения расширения
     */
	function getName(){
    
        return 'siteModul';
       
    }

	/**
	 * 
	 * Удаление записи, перед использованием надо установить id записи
	 */
	function delete(){
		$select = $this->dataBase->SelectFromDB(__LINE__);
		$isdelete = $select->addFrom($this->table)->addFild('delete_security')->addWhere("`".$this->idField."`='".$this->getId()."'")->queryDB();
		if($isdelete[0]['delete_security']=='0'){
			$delete = $this->dataBase->DeleteFromDB( __LINE__ );		
			$delete	-> addTable($this->table) -> addWhere("`".$this->idField."`='".$this->id."'") -> queryDB();
		}
	}
	/**
	 * @see fmake/modules/core/fmakeCore/fmakeCore::getByPage()
	 */
	function getByPage($parent,$limit, $page,$active = false) {
		$select = $this->dataBase->SelectFromDB( __LINE__);
		$order = $this->order;
		if($active){
			$select -> addWhere("active='1'");
		}
		return $select -> addFrom($this->table.$table) -> addOrder($order, DESC)->addWhere($this->table.'.id_parent in ('.$parent.')') -> addLimit((($page-1)*$limit), $limit) -> queryDB();
	}
	
}