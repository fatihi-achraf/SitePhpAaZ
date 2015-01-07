<?php 
	
	/**
	* 
	*/
	class PagesController extends Controller
	{
		function view($id){
			
			$this->loadModel('Post');
			$d['page'] = $this->Post->findFirst(array(
				'condition'  => array(
						'id'	=> $id,
						'type'	=> 'page'
						) 
				));
			if (empty($d['page'])) {
				$this->e404('Page introuvable');
			}

			$d['pages'] = $this->Post->find(array(
				'condition'  => array(
						'type'	=> 'page'						) 
				));
			$this->set($d);
		}
		/*function view($nom)
		{
			$this->set(array(
					'phrase' =>"Salut",
					'prenom' =>"achraf",
					'nom'=> "Fatihi"
				));
			$this->render('index');
		}*/
	}

 ?>
