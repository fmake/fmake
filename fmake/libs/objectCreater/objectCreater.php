<?php
/**
 * 
 * @author n1k
 * создание объектов во все системе
 *
 */
	class objectCreater{
		static $startPathSearcher = 1;
		static $endPathSearcher = 1;
		static $extension = ".php";
		
		
		static function setDirPaths()
		{
			set_include_path(
				get_include_path().ROOT.DIRECTORY_SEPARATOR.PATH_SEPARATOR
				.ROOT.DIRECTORY_SEPARATOR.'fmake'.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.PATH_SEPARATOR
				.ROOT.DIRECTORY_SEPARATOR.'fmake'.DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.PATH_SEPARATOR
				.ROOT.DIRECTORY_SEPARATOR.'fmake'.DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR.PATH_SEPARATOR
				.ROOT.DIRECTORY_SEPARATOR.'calculating'.DIRECTORY_SEPARATOR
			);	
			
			ini_set('unserialize_callback_func', 'spl_autoload_call');
        	spl_autoload_register(array(new self, 'createObj'));
			//размер уже установленных патчей, чтобы не смотреть в лишних директориях
			objectCreater::$endPathSearcher = sizeof(explode(PATH_SEPARATOR, get_include_path())) - 1;
				
		}
		
		
		static function createObj($name)
		{
			echo $name."<br />";
			$fileName = self::findFile($name);
			if($fileName){
				require  $fileName;
			}

		}
		
		public function findFile($class)
		{
			/*if (isset($this->classMap[$class])) {
				return $this->classMap[$class];
			}
		*/
			if ('\\' == $class[0]) {
				$class = substr($class, 1);
			}
		
			if (false !== $pos = strrpos($class, '\\')) {
				// namespaced class name
				$classPath = str_replace('\\', DIRECTORY_SEPARATOR, substr($class, 0, $pos)) . DIRECTORY_SEPARATOR;
				$className = substr($class, $pos + 1);
			} else {
				// PEAR-like class name
				$classPath = $class.DIRECTORY_SEPARATOR;
				$className = $class;
			}
		
			
			$classPath .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
			echo $classPath;
			/*
			foreach ($this->prefixes as $prefix => $dirs) {
				if (0 === strpos($class, $prefix)) {
					foreach ($dirs as $dir) {
						if (file_exists($dir . DIRECTORY_SEPARATOR . $classPath)) {
							return $dir . DIRECTORY_SEPARATOR . $classPath;
						}
					}
				}
			}
		
			foreach ($this->fallbackDirs as $dir) {
				if (file_exists($dir . DIRECTORY_SEPARATOR . $classPath)) {
					return $dir . DIRECTORY_SEPARATOR . $classPath;
				}
			}
			*/
			
			if ($file = stream_resolve_include_path($classPath)) {
				return $file;
			}
		
			//$this->classMap[$class] = false;
		}
		
	}
