<?php
	
	//require_once(__DIR__.'/../Metier/Admin.php');
	class AdminGateway{
		
		private $connect;

		public function __construct($con){
			$this->connect=$con;
		}

		public function listerTousLesAdmin(): array {
			$listeAdmin=[];
			$requete='SELECT * FROM Admin WHERE ';
			if($this->connect->executeQuery($requete, array())){
				$resultats=$this->connect->getResults();
				foreach ($resultats as $val) {
					$listeAdmin[]= new Admin($val['idAdmin'], $val['login'], $val['mdp']);
				}
			}
			return $listeAdmin;
		}

		public function selectionnerUnAdmin($login): Admin {
			$admin;
			$requete = 'SELECT * FROM Admin WHERE login = :loginRech AND mdp = :mdpRech';
			if($this->connect->executeQuery($requete, array(':loginRech' => array($login,PDO::PARAM_STR )))) {
				$resultats = $this->connect->getResults();
				foreach ($resultats as $val) {
					$admin = new Admin($val['login'], $val['mdp']);
				}
			}
			return $admin;
		}

		/*public function ajouterAdmin($loginNew, $mdpNew): bool{
			$requete = 'INSERT INTO Admin VALUES(:login, :mdp)';
			$mdpCrypt = password_hash($mdpNew, PASSWORD_DEFAULT)
			return ($this->connect->executeQuery($requete, array(':login' => array($login,PDO::PARAM_STR ), ':mdp' => array($mdpCrypt,PDO::PARAM_STR ))));
		}*/
	}



?>