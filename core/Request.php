<?php 
	
	class Request{

		public $url;

		function __construct(){
			$this->url=$_SERVER['PATH_INFO']; // info path affiche le lien apres sitePhpAaZ
		}
	}

?>