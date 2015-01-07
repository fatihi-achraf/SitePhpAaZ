<?php 
	
	class Dispatcher{

		var $request;

		function __construct(){
			$this->request=new Request();
			Router::parse($this->request->url,$this->request); //utilise :: prsk Router est une classe global(static)
			$controller = $this->loadController();
			if(!in_array($this->request->action, get_class_methods($controller))){
				$this->errors('le controlleur '.$this->request->controller.
					'ne contient pas de methode '.$this->request->action);
			}else{

			call_user_func_array(array($controller,$this->request->action), $this->request->params); 
			/* permet d'appeler une autre fonction en spécifiant la function qui se trouve dans controller
			 et les params dans 2 array*/
			 $controller->render($this->request->action);
			}
		}
		function errors($message){
			
			$controller = new Controller($this->request);
			$controller->e404($message);
			}

		function loadController(){
			$name=ucfirst($this->request->controller)."Controller";
			$file = ROOT.DS."controller".DS.$name.".php";
			require $file;
			return new $name($this->request);

		}
	}	
?>