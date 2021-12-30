<?php
	/**
	 * Classe métier de la configuration
	 * @package Modeles/Metier
	 * @author Antoine Viton, Adrien Coudour
	 */
	class Configuration{
		private $idElemConfig;
		private $nomElemConfig;
		private $config;
		/**
		 * Constructeur de la classe métier configuration
		 */
		public function __construct($idElemConfig, $nomElemConfig, $config){
			$this->idElemConfig = $idElemConfig;
			$this->nomElemConfig = $nomElemConfig;
			$this->config = $config;
		}
		/**
		 * Méthode toString de la classe métier Configuration
		 * @return string Affichage de la classe métier Configuration
		 */
		public function __toString(){
			return $this->idElemConfig." ".$this->nomElemConfig." ".$this->config;
		}
		/**
		 * Méthode get de la classe métier Configuration
		 * @param string $name Nom de la News
		 * @return string Peut renvoyer tous les attributs de la classe selon le case name
		 */
		public function __get($name){
			switch ($name) {
				case 'idElemConfig':
					return $this->idElemConfig;
					break;
				case 'nomElemConfig':
					return $this->nomElemConfig;
					break;
				case 'config':
					return $this->config;
					break;
				default:
					return null;
					break;
			}
		}

	}
		
?>