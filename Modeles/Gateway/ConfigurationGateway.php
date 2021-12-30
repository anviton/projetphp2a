<?php
	
	/**
	 * Classe de la gateway de la configuration
	 * @package Modele/Gateway
	 * @author Antoine Viton, Adrien Coudour
	 */
	class ConfigurationGateway{
		private $connect;
		/**
		 * Constructeur du gateway de la Configuration
		 *  @param string $con permet la connexion
		 */
		public function __construct($con){
			$this->connect=$con;
		}
		/**
		 * Méthode permettant de connaitre le nombre de news sur une page
		 * @return int Entier du nombre de news par page
		 */
		public function connaitreLeNbDeNewsParPage(){
			$requete='SELECT * FROM Configuration WHERE nomElemConfig = :nom';
			$this->connect->executeQuery($requete, array(':nom' => array('nbNewsPage',PDO::PARAM_STR)));
			$resultats = $this->connect->getResults();
			foreach($resultats as $val){
				$nbNewsParPage = $val['config'];
			}
			return $nbNewsParPage;
		}
		/**
		 * Méthode permettant de modifier le nombre de news par page
		 * @param int entier avec le nouveau nombre de news par page
		 */
		public function modifierLeNbDeNews($nbNewsParPage){
			$gNews = new NewsGateway($this->connect);
			$nbNews = $gNews->compterLesNews();
			if ($nbNewsParPage > $nbNews) {
				$nbNewsParPage = $nbNews;
			}
			if ($nbNewsParPage < 1) {
				$nbNewsParPage = $this->connaitreLeNbDeNewsParPage();
			}
			$requete = 'UPDATE Configuration SET config = :nb WHERE nomElemConfig = :nom';
			$this->connect->executeQuery($requete, array(':nom' => array('nbNewsPage',PDO::PARAM_STR), ':nb' => array($nbNewsParPage,PDO::PARAM_STR)));
		}
	}

?>