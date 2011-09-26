<?php

class SearchSystem extends fmakeCore{
	
	public $table = "search_table";
	
	public $search = array(
		0 => array( 'host'=>'go.mail.ru','query' => 'q','call' => 'cptoutf','caption' => 'Mail.ru' ),
		1 => array( 'host'=>'www.google.ru','query' => 'q','caption' => 'Google.ru' ),
		2 => array( 'host'=>'yandex.ru','query' => 'text','caption' => 'Yandex.ru' )
	);
	
	public $stopWords = "секс,пизда,жопа,сука,";
	
	/**
	 * 
	 * проверка на стоп слова
	 * @param $query
	 */
	function stopWordsCheck($query){
		$words = preg_split('/ /', $query);
		$stopWords = preg_split('/,/', $this -> stopWords );
		$sizeI = sizeof($words);
		for($i=0;$i<$sizeI;$i++){
			$sizeJ = sizeof($stopWords);
			for($j=0;$j<$sizeJ;$j++){
				if(!$stopWords[$j])return;
				if( preg_match("/{$stopWords[$j]}/i",$words[$i] ) ){
					return true;
				}
			}
		}
		return false;
	}
	
	/**
	 * 
	 * перевести в utf
	 * @param string $str
	 */
	function cptoutf($str){
		return iconv("CP1251","UTF-8", $str ) ;
	}
	
	/**
	 * 
	 * узнать запрос и поисковую систему
	 * @param $url
	 */
	function getSearchSystem($url){
		$scheme = parse_url($url);
		$sizeI = sizeof($this -> search);
		for ($i=0;$i<$sizeI;$i++){
			if( $this -> search[$i]['host'] == $scheme['host']){
				$vars = preg_split('/\&/', $scheme['query']);
				$sizeJ = sizeof($vars);
				for($j=0;$j<$sizeJ;$j++){
					$var_val = ( preg_split('/\=/', $vars[$j]) );
					if( $var_val[0] == $this -> search[$i]['query'] ){
						
						
						
						$query = urldecode( $var_val[1] ) ;
						// вызываем функцию для запроса если она заданна
						if($this -> search[$i]['call']){
							$query = call_user_func(array($this,$this -> search[$i]['call']),$query);
						}
						
						if( !$this -> stopWordsCheck($query) ){
							return ( array( 'search_num' => $i,'query' => $query) );
						
						}
					}
				}
				
			}
		}
		
	}
	
	function getItems($system = false,$count = false) {
		$select = $this->dataBase->SelectFromDB(__LINE__);
		if($count){
			$select->addLimit(0,intval($count));
		}
		else{
			$select->addLimit(0,10);
		}
		if($system){
			$select->addWhere("search_num = '".$system."'");
		}
		return $select->addOrder('id',DESC)->addFrom($this->table)->queryDB();
	}
	
}