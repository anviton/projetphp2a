<?php
	/**
	 * Classe métier des news
	 * @package Modeles/Metier
	 * @author Antoine Viton, Adrien Coudour
	 */
	class News{
		private $idNews;
		private $heure;
		private $titre;
		private $site;
		private $description;
		private $fkIdFlux;
		/**
		 * Constructeur de la classe métier News
		 */
		public function __construct($heure, $titre, $site, $description, $fkIdFlux, $idNews=""){
			$this->idNews=$idNews;
			$this->heure=$heure;
			$this->titre=$titre;
			$this->site=$site;
			$this->description=$description;
			$this->fkIdFlux=$fkIdFlux;
		}
		/**
		 * Méthode toString de la classe métier News
		 * @return string Affichage de la classe métier News
		 */
		public function __toString(){
			return $this->heure." ".$this->titre." ".$this->site." ".$this->description;
		}
		/**
		 * Méthode get de la classe métier News
		 * @param string $name Nom de la News
		 * @return string Peut renvoyer tous les attributs de la classe selon le case name
		 */
		public function __get($name){
			switch ($name) {
				case 'idNews':
					return $this->idNews;
					break;
				case 'heure':
					return $this->heure;
					break;
				case 'titre':
					return $this->titre;
					break;
				case 'site':
					return $this->site;
					break;
				case 'description':
					return $this->description;
					break;
				case 'fkIdFlux':
					return $this->fkIdFlux;
					break;
				default:
					return null;
					break;
			}
		}
	}
?>