<?php
/**
 * Classe du model de la configuration
 * @package  Modeles
 * @author Antoine Viton, Adrien Coudour
 */
	class ModelConfiguration{


		/**
		 * Méthode permettant de modifier le nombre de news par page
		 * @param int $nbNewsParPage nouvel valeur du nombre de news par page
		 */
		public function modifierLeNombreDeNews($nbNewsParPage){
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gConfig = new ConfigurationGateway($connect);
			$gConfig->modifierLeNbDeNews($nbNewsParPage);
		}

		/**
		 * Méthode permettant de récupérer le nombre de news par page
		 * @return int Nombre de news par page 
		 */
		public function nombreDeNewsParPage(): int{
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gConfig = new ConfigurationGateway($connect);
			$res = $gConfig->connaitreLeNbDeNewsParPage();
			return $res;
		}

	//fin modèles
	}