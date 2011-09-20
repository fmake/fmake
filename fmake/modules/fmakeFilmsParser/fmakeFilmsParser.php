<?php
class fmakeFilmsParser extends fmakeCore{
	/**
	 * 
	 * имя PRIMARY KEY
	 * @var string
	 */
	public $idField = "id";
	
	/**
	 * 
	 * основная таблица с которой работает класс 
	 * @var string
	 */
	public $table = "films_tmp";
	public $table_donor = "dle_post";
	
	public $order = "date";
	
	public $fileDirectory = "images/films/";
	
	/**
	 * 
	 * Создание нового объекта, с использованием массива params, c учетов поля position
	 */
	function newItem(){
		$insert = $this->dataBase->InsertInToDB(__LINE__);	
			
		$insert	-> addTable($this->table);
		$this->getFilds();
		
		if($this->filds){
			if(in_array('position',$this->filds)){
				$select = $this->dataBase->SelectFromDB(__LINE__);
				$position = $select -> addFild('MAX(`position`) AS `position`') -> addFrom($this->table) -> queryDB();
				$this->params['position'] = $position[0]['position'] + 1;
			}
			
			foreach($this->filds as $fild){
				if(!isset($this->params[$fild])) continue; 
				$insert -> addFild("`".$fild."`", $this->params[$fild]);
			}
			
		}
		$insert->queryDB();
		$this->id = $insert	-> getInsertId();
	}
	/**
	 * 
	 * добавление файла
	 * @param string $tempName
	 * @param string $name
	 */
	
	function addFile($url,$name){
		$curl = new cURL();
		$curl->init();
		$curl->get($url);
		$qq = $curl->data();
		$f = fopen(ROOT.'/temp/file.jpg','w+');
		fwrite($f,$qq);
		fclose($f);
		$tempName = ROOT.'/temp/file.jpg';
		$dirs = explode("/", $this->fileDirectory.'/'.$this->id);
		$dirname = ROOT."/";
		
		foreach($dirs as $dir)
		{
			$dirname = $dirname.$dir."/";
			if(!is_dir($dirname)) mkdir($dirname);	
		}
		
		$images = new imageMaker($name);
		$images->imagesData = $tempName;
		$images->resize(600,480,false,$dirname,'',false);
		$images->resize(160,235,true,$dirname,'mini_',false);
	}	
	
	function addFiles($urls){
		$select = $this->dataBase->SelectFromDB( __LINE__);
		$result = $select->addFild('image_mini_count')->addFrom($this->table)->addWhere("id = '".$this->id."'")->queryDB();
		$count = intval($result[0]['image_mini_count']);
		$array = preg_split("/\n/", $urls);
		//printAr($array);
		
		$dirs = explode("/", $this->fileDirectory.'/'.$this->id.'/mini');
		$dirname = ROOT."/";
		
		foreach($dirs as $dir)
		{
			$dirname = $dirname.$dir."/";
			if(!is_dir($dirname)) mkdir($dirname);	
		}
		if(!is_dir($dirname.'/thumbs/'))mkdir($dirname.'/thumbs/');
		
		//foreach($array as $key=>$f){
		$curl = new cURL();
		$curl->init();
		for($i=0;$i<sizeof($array);$i++){
			//echo $array[$i];
			$curl->get(trim($array[$i]));
			$qq = $curl->data();
			//echo($qq);
			//echo "<br />-------------------------------";
			$file = fopen(ROOT.'/temp/file'.$i.'.jpg','w+');
			fwrite($file,$qq);
			fclose($file);
			$tempName = ROOT.'/temp/file'.$i.'.jpg';
			
			$images = new imageMaker('image'.(++$count).'.jpg');
			$images->imagesData = $tempName;
			$images->resize(600,480,false,$dirname,'',false);
			$images->resize(108,73,true,$dirname.'/thumbs/','',false);
			//unlink($tempName);
			//exit;
		}
		$update = $this->dataBase->UpdateDB( __LINE__);
		$result = $update->addTable($this->table)->addFild("`image_mini_count`", $count)->addWhere("id = '".$this->id."'")->queryDB();
	}
}
?>