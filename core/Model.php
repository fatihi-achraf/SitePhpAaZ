<?php 
	
	class Model{

		static $connextions = array();
		public $db = 'default';
		public $table = false;
		public $pdo;

		function __construct(){

			// Creationd e la Base de donnée
			if(isset(Model::$connextions[$this->db])){
				$this->pdo = Model::$connextions[$this->db];
				return true;
			}
			$conf = Conf::$databases[$this->db];
			try {
				$this->pdo = new PDO('mysql:host='.$conf['host'].';dbname='
					.$conf['database'].';',
					 $conf['user'] ,
					 $conf['password'],
					 array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ) // spécifier l'encodage utf8 au niveau de MYSQL
					 );
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

				Model::$connextions[$this->db] = $this->pdo;
			} catch (PDOException $e) {
				die($e->getMessage());
			}

			// initialisation du nom de la table
			if($this->table === false){
				$this->table = strtolower(get_class($this)).'s' ;
			}
		}

		function find($req){
			
			$sql = 'SELECT * FROM '.$this->table.' as '.get_class($this).' ';
			// condition de la requete
			if(isset($req['condition'])){
				$sql .= 'WHERE ';
				if(!is_array($req['condition'])){
					$sql .= $req['condition'];
				}else{
					$cond = array();
					foreach ($req['condition'] as $k => $v) {
						if (!is_numeric($v)){
							$v = $this->pdo->quote($v); // enlever les '' ""  en ajoutant des \
 						}

						$cond[]= "$k=$v";
 						
					}
					$sql .=implode(" AND ", $cond); // 1er condition est concatener directement, 2eme condition est separer avec AND

				}
			}

			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_OBJ);

		}
		function findFirst($req){
			
			return current($this->find($req));

		}
	}
 ?>