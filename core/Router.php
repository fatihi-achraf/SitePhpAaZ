<?php 
	
	class Router{

		/*
		*permet de parser une URL
		*@param $url url a parser
		*@return array contient les parametres
		*/
		static function parse($url,$request){
			$url=trim($url,'/');
			$param=explode('/', $url);
			$request->controller = $param[0] ;
			$request->action = isset($param[1]) ?$param[1] : 'index';
			$request ->params = array_slice($param, 2);
			 /*sauter les 2 1er param de url et sauvgarder le reste dans params*/
			return true;

		}
	}

?>