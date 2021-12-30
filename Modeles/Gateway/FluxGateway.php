<?php
	
		
	/**
	 * Classe de la gateway des flux
	 * @package Modele/Gateway
	 * @author Antoine Viton, Adrien Coudour
	 */
	class FluxGateway{
		
		private $connect;
		/**
		 * Constructeur du gateway du flux
		 *  @param string $con permet la connexion
		 */
		public function __construct($con){
			$this->connect=$con;
		}
		/**
		 * Méthode permettant de lister tous les flux
		 * @return array Liste avec tous les flux
		 */
		public function listerTousLesFlux(): array {
			$listeFlux=[];
			$requete='SELECT * FROM flux';
			if($this->connect->executeQuery($requete, array())){
				$resultats=$this->connect->getResults();
				foreach ($resultats as $val) {
					$listeFlux[]= new Flux($val['idFlux'], $val['nom'], $val['dateDerMaj']);
				}
			}
			return $listeFlux;
		}
		/**
		 * Méthode permettant d'ajouter un flux
		 * Ajoute la date de la dernière mise à jour
		 * @param string $nom nom du flux à ajouter
		 */
		public function ajoutrerUnFlux($nom){
			$date=strftime("%y-%m-%d");
			//$date="2021-11-18";
			$requete='INSERT INTO flux(nom, dateDerMaj) VALUES(:nom, :dateDerMaj)';
			$this->connect->executeQuery($requete, array(':nom' => array($nom,PDO::PARAM_STR ), ':dateDerMaj' => array($date,PDO::PARAM_STR )));
		}
		/**
		 * Méthode permettant de supprimer un flux
		 * @param string $id id du flux à supprimer
		 */
		public function supprimerUnFlux($id){
			$requete='DELETE FROM flux WHERE idFlux=:nomFlux';
			$this->connect->executeQuery($requete, array(':nomFlux' => array($id,PDO::PARAM_INT )));
		}
		/**
		 * Méthode mettant à jour un flux
		 * @param string $nom du flux à mettre à jour
		 * @param string $date date de la mise à jour du flux
		 */
		public function mettreAjourUnflux($nom, $date){
			$requete = 'UPDATE flux SET dateDerMaj = :dateMaj WHERE nom = :nomFlux';
			//$date="2021-11-18";
			var_dump($date);
			var_dump($nom);

			$this->connect->executeQuery($requete, array(':nomFlux' => array($nom, PDO::PARAM_STR), ':dateMaj' => array($date, PDO::PARAM_STR)));
		}
	}



?>