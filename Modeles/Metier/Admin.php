<?php
	/**
	 * Classe métier des Admins
	 * @package Modeles/Metier
	 * @author Antoine Viton, Adrien Coudour
	 */
	class Admin{
		private $idAdmin;
		private $login;
		private $mdp;


		/*function __construct($idAdmin, $login, $mdp){
			$this->idAdmin=$idAdmin;
			$this->login=$login;
			$this->mdp=$mdp;
			
		}*/
		/**
		 * Constructeur de la classe métier Admin
		 */
		function __construct($login, $mdp=0){
			$this->login = $login;
			$this->mdp = $mdp;
		}
		/**
		 * Méthode toString de la classe Métier Admin
		 * @return string Affichage de la classe métier Admin
		 */
		function __toString(){
			return $this->idAdmin." ".$this->login;
		}
		/**
		 * Méthode get de la classe métier Admin
		 * @param string $name Nom de la News
		 * @return string Peut renvoyer tous les attributs de la classe selon le case name
		 */
		public function __get($name){
			switch ($name) {
				case 'idAdmin':
					return $this->idAdmin;
					break;
				case 'login':
					return $this->login;
					break;
				case 'mdp':
					return $this->mdp;
					break;
				default:
					return null;
					break;
			}
		}
	}
?>