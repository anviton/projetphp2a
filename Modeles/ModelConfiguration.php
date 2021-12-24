<?php

	class ModelConfiguration{

		//constructeur
		//vide


		public function modifierLeNombreDeNews($nbNewsParPage){
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gConfig = new ConfigurationGateway($connect);
			$gConfig->modifierLeNbDeNews($nbNewsParPage);
		}

		public function nombreDeNewsParPage(): int{
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gConfig = new ConfigurationGateway($connect);
			$res = $gConfig->connaitreLeNbDeNewsParPage();
			return $res;
		}

	//fin modèles
	}