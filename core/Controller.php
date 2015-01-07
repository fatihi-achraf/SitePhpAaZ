<?php 
	
	/**
	* Controller
	*/
	class Controller 
	{
		public $request; 				// Objet Reequest
		private $vars 		= array();  // Variables à passer à la vue
		public $layout 		='default';	// Layout à utiliser pour rendre la vue
		private $rendered	= false;	// Si le rendu a été fait ou pas ?
		/**
		* Constructeur 
		* @param $request Objet request  de notre application
		**/
		function __construct($request){
			$this->request=$request; // On stock la request dans l'instance
		}
		/**
		* Permet de rendre une vue
		* @param $view Fichier à rendre (chemin depuis view ou nom de la vue)
		**/
		public function render($view){
			if ($this->rendered) {
				return false;
			}else{
				extract($this->vars);
				if(strpos($view, '/')===0){ //Si la variable view commence avec  / 
					$view = ROOT.DS.'view'.$view.'.php';
				}else{
					$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
				}
				ob_start();
				require($view);
				$content_fot_layout =ob_get_clean();
				require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
				$rendered = true;
			}
		}
		/**
		* Permet de passer une ou plusieurs variable à la vue
		* @param $key nom de la variable OU Tableau de variables
		* @param $value Valeur de la variable
		**/
		public function set($key,$value=null){
			if(is_array($key)){
				$this->vars = $key;
			}else{
				$this->vars[$key] = $value;
			}
		}

		/**
		* Permet de charger Un Model 
		**/
		function loadModel($name){
			$file = ROOT.DS.'model'.DS.$name.'.php';
			require_once ($file);
			if(!isset($this->$name)){
				$this->$name = new $name();
			}
		}

		function e404($message){
			header("HTTP/1.0 404 Not Found");
			$this->set("message",$message);
			$this->render('/errors/404');
			die();
		}
	}
 ?>