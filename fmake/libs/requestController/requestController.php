<?PHP
namespace fmake\libs\requestController;
/**
 * 
 * Контроль переменных из вне
 * @author n1k
 *
 */
class requestController{
	
	
	function __isset($key)
	{	
		return isset( $_REQUEST[$key] );
	}
  	
	function __get($key)
	{	
		return $this -> __isset ( $key ) ? $_REQUEST[$key] : false;
	}
	
	
	
	function getEscapeVal($val){
		return mysql_real_escape_string($val);
	}
	
	function getEscape($key){
		return $this -> __isset ( $key ) ? mysql_real_escape_string($_REQUEST[$key]) : false;
	}
	
	
	// приводим в нормальный вид перед добавление в базу
	function allEscape($array = false,$key = false){
		if(!$array)$array = &$_REQUEST;
		
			foreach ($array as $key=>&$value){
				
				if(is_array($value)){
					$value = $this->allEscape($value);
				}else{
					$value = mysql_real_escape_string($value);
				}
				
			}
			
		return $array;
	}
	
	function injectionWordNone($word){
		$word = mysql_real_escape_string ($word);
 
	    $word = strip_tags($word);
	         
	    $word = htmlspecialchars($word);
	 
	    $word = stripslashes($word);
	     
	    return addslashes($word); 
	}
	
	// приводим в нормальный вид перед добавление в базу (защита от всех иньекций)
	function allSqlInjectionNone($array = false,$key = false){
		if(!$array)$array = &$_REQUEST;
		
			foreach ($array as $key=>&$value){
				
				if(is_array($value)){
					$value = $this->allEscape($value);
				}else{
					$value = $this->injectionWordNone($value);
				}
				
			}

		return $array;
	}
	
}
?>