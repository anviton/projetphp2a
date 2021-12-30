<?php
	
	/**
	 * Classe de la gateway de l'admin
	 * @package Modele/Gateway
	 * @author Antoine Viton, Adrien Coudour
	 */
	class AdminGateway{
		
		private $connect;
		/**
		 * Constructeur du gateway de l'admin
		 *  @param string $con permet la connexion
		 */
		public function __construct($con){
			$this->connect=$con;
		}
		/**
		 * Méthode permettant de récupérer tous les administrateurs
		 * @return array Liste des administrateur
		 */
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
		/**
		 * Méthode permettant de selectionner un administrateur
		 * @param string $login de l'administrateur concerné
		 * @return Admin renvoie l'administrateur avec son login et son mot de passe, si il n'existe pas renvoie null
		 */
		public function selectionnerUnAdmin($login): ?Admin {
			$admin = null;
			$requete = 'SELECT * FROM Admin WHERE login = :loginRech';
			$this->connect->executeQuery($requete, array(':loginRech' => array($login,PDO::PARAM_STR )));
			$resultats = $this->connect->getResults();
			if($resultats != null){
				foreach ($resultats as $val) {
					$admin = new Admin($val['login'], $val['mdp']);
				}
				return $admin;
			}
			else{
				return null;
			}
		}

		/*public function ajouterAdmin($loginNew, $mdpNew): bool{
			$requete = 'INSERT INTO Admin VALUES(:login, :mdp)';
			$mdpCrypt = password_hash($mdpNew, PASSWORD_DEFAULT)
			return ($this->connect->executeQuery($requete, array(':login' => array($login,PDO::PARAM_STR ), ':mdp' => array($mdpCrypt,PDO::PARAM_STR ))));
		}*/
	}



?>