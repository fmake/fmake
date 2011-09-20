<?php
	class fmakeNews extends fmakeCore{
		
		public $table = "sites";
		
		
		function getNew($id){
			$this->setId($id);
			$this->getInfo();
			
		}
	}