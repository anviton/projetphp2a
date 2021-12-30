<?php
	/**
	 * Classe métier des flux
	 * @package Modeles/Metier
	 * @author Antoine Viton, Adrien Coudour
	 */
	class Flux{
		private $idFlux;
		private $titre;
		private $dateDerMaj;

		/**
		 * Constructeur de la classe métier Flux
		 */
		function __construct($idFlux, $titre, $dateDerMaj){
			$this->idFlux=$idFlux;
			$this->titre=$titre;
			$this->dateDerMaj=$dateDerMaj;
			
		}
		/**
		 * Méthode toString de la classe métier Flux
		 * @return string Affichage de la classe métier Flux
		 */
		function __toString(){
			return $this->idFlux." ".$this->titre;
		}
		/**
		 * Méthode get de la classe métier Flux
		 * @param string $name Nom de la News
		 * @return string Peut renvoyer tous les attributs de la classe selon le case name
		 */
		public function __get($name){
			switch ($name) {
				case 'idFlux':
					return $this->idFlux;
					break;
				case 'titre':
					return $this->titre;
					break;
				case 'dateDerMaj':
					return $this->dateDerMaj;
					break;
				default:
					return null;
					break;
			}
		}
	}
?>