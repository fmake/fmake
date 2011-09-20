<?php
class fmakeFilms extends fmakeCore{
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
	
	public $order = "date";
	
	public $fileDirectory = "images/films/";
	
	function getByPageCount($active = false) {
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		$result = $select ->addFild("COUNT(*)")-> addFrom($this->table) -> queryDB();
		return $result[0]["COUNT(*)"];		
	}
	/**
	 * 
	 * популярные
	 */
	function getPopular($count,$active = false){
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		return $select->addFrom($this->table)->addWhere("populyar = '1'")->addOrder($this->order,DESC)->addLimit(0,$count)->queryDB();
	}
	
	/**
	 * 
	 * Новинки
	 */
	function getNewsFilmCount($count,$active = false){
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		return $select->addFrom($this->table)->addWhere("inmenu = '1'")->addOrder($this->order,DESC)->addLimit(0,$count)->queryDB();
	}
	

	function getByPageNew($limit, $page, $active = false) {
		
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		return $select -> addFrom($this->table) -> addOrder($this->order, DESC)->addWhere("inmenu = '1'")->addOrder($this->order,DESC) -> addLimit((($page-1)*$limit), $limit) -> queryDB();
	}
	function getByPageCountNew($active = false) {
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		$result = $select ->addFild("COUNT(*)")-> addFrom($this->table)->addWhere("inmenu = '1'") -> queryDB();
		return $result[0]["COUNT(*)"];		
	}
	/**
	 * 
	 * последние добавленные
	 */
	function getLastFilms($count,$active = false){
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		return $select->addFrom($this->table)->addOrder($this->order,DESC)->addWhere("inmenu <> '1'")->addWhere("populyar <> '1'")->addLimit(0,$count)->queryDB();
	}
	
	function getRandFilms($count,$active = false,$id_films_no = false){
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		if($id_films_no)	
			$select->addWhere("id <> ".$id_films_no);
		return $select->addFrom($this->table)->addOrder("RAND()")->addLimit(0,$count)->queryDB();
	}
	
	/**
	 * 
	 * поиск 
	 * @param string $text
	 * @param int $limit
	 * @param int $page
	 */
	
	function Search($text,$limit,$page,$active = false){
		$select = $this->dataBase->SelectFromDB(__LINE__);
		if($active)
			$select -> addWhere("active='1'");
		$text = trim($text);
		$text = explode(" ",$text);
		$size = sizeof($text);
		$where = "(";
		for($i=0;$i<$size;$i++){
			if($i==$size-1) $where .= " caption LIKE '%".$text[$i]."%')"; 
			else $where .= "caption LIKE '%".$text[$i]."%' OR ";
		}
		$select-> addLimit((($page-1)*$limit), $limit);
		$result = $select->addFrom($this->table)->addWhere($where)->queryDB();
		return $result;
	}
	
	/**
	 * 
	 * колличество найденных записей
	 * @param string $text
	 */
	
	function SearchCount($text,$active = false){
		$select = $this->dataBase->SelectFromDB(__LINE__);
		if($active)
			$select -> addWhere("active='1'");
		$text = trim($text);
		$text = explode(" ",$text);
		$size = sizeof($text);
		$where = "(";
		for($i=0;$i<$size;$i++){	
			if($i==$size-1) $where .= " caption LIKE '%".$text[$i]."%')"; 
			else $where .= "caption LIKE '%".$text[$i]."%' OR ";
		}
		$result = $select->addFild("COUNT(*)")->addFrom($this->table)->addWhere($where)->queryDB();
		return $result[0]["COUNT(*)"];
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
	
	
	function getMiniImage($dir){
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					if($file!='.' && $file!='..') $array[] = $file;
				}
				closedir($dh);
			}
		}
		return $array;
	}
	
	function deleteImage(){
		if(file_exists(ROOT.'/'.$this->fileDirectory.'/'.$this->id.'/image.jpg')){
			unlink(ROOT.'/'.$this->fileDirectory.'/'.$this->id.'/image.jpg');
			unlink(ROOT.'/'.$this->fileDirectory.'/'.$this->id.'/mini_image.jpg');
		}
	}
	
	function deleteImageMini($name){
		if(file_exists(ROOT.'/'.$this->fileDirectory.'/'.$this->id.'/mini/'.$name)){
			unlink(ROOT.'/'.$this->fileDirectory.'/'.$this->id.'/mini/'.$name);
			unlink(ROOT.'/'.$this->fileDirectory.'/'.$this->id.'/mini/thumbs/'.$name);
		}
	}
	
	function getByPageGenre($id_genre,$limit, $page, $active = false) {
		
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		$fmakeFilmsGenre = new fmakeFilms_genre();
		if($id_genre){
			$select->addWhere($fmakeFilmsGenre->table_notice_tags.'.id_film = '.$this->table.'.id')->addWhere($fmakeFilmsGenre->table_notice_tags.'.id_genre = '.$id_genre);
		}
		else{
			return false;
		}
		return $select -> addFrom($this->table.','.$fmakeFilmsGenre->table_notice_tags) -> addOrder($this->order, DESC) -> addLimit((($page-1)*$limit), $limit) -> queryDB();
	}
	
	function getByPageGenreCount($id_genre,$active = false) {
		
		$select = $this->dataBase->SelectFromDB( __LINE__);
		if($active)
			$select -> addWhere("active='1'");
		$fmakeFilmsGenre = new fmakeFilms_genre();
		if($id_genre){
			$select->addWhere($fmakeFilmsGenre->table_notice_tags.'.id_film = '.$this->table.'.id')->addWhere($fmakeFilmsGenre->table_notice_tags.'.id_genre = '.$id_genre);
		}
		else{
			return false;
		}
		$result = $select ->addFild("COUNT(*)")-> addFrom($this->table.','.$fmakeFilmsGenre->table_notice_tags) -> queryDB();
		return $result[0]["COUNT(*)"];
	}
}
?>