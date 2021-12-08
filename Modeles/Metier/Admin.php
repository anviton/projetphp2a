<?php
	class Admin{
		private $idAdmin;
		private $login;
		private $mdp;


		function __construct($idAdmin, $login, $mdp){
			$this->idAdmin=$idAdmin;
			$this->login=$login;
			$this->mdp=$mdp;
			
		}

		function __toString(){
			return $this->idAdmin." ".$this->login;
		}

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