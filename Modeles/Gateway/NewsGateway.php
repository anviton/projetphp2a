<?php
		
	/**
	 * Classe de la gateway des news
	 * @package Modele/Gateway
	 * @author Antoine Viton, Adrien Coudour
	 */
	class NewsGateway{
		private $connect;
		/**
		 * Constructeur du gateway des news
		 *  @param string $con permet la connexion
		 */
		public function __construct($con){
			$this->connect=$con;
		}
		/**
		 * Méthode permettant de lister toutes les news
		 * @return array Liste de toutes les news
		 */
		public function listerToutesLesNews(): array {
			$listeNews;
			$nbLigne = $this->compterLesNews();
			$requete='SELECT * FROM news';
			$this->connect->executeQuery($requete, array(':nbLignes' => array(($nbLigne-1*10),PDO::PARAM_INT)));
			$resultats=$this->connect->getResults();
			foreach ($resultats as $val) {
				$listeNews[]= new News($val['heure'], $val['titre'], $val['site'], $val['description'], $val['fkIdFlux'], $val['idNews']);
			}
			
			return $listeNews;
		}
		/**
		 * Méthode permettant d'ajouter une nouvelle news
		 * @param string $heure Heure de l'ajout de la news à ajouter
		 * @param string $titre Titre de la news à ajouter
		 * @param string $site Site de la news à ajouter
		 * @param string $description Description de la news
		 * @param string $fkidFlux id du flux
		 */
		public function ajouterUneNews($heure, $titre, $site, $description, $fkIdFLux){
			//$heureModif = '2021-12-16'; //(new DateTime($heure))->format(DATE_ATOM);;
			$requete='INSERT INTO news(heure, titre, site, description, fkIdFLux) VALUES(:heure, :titre, :site, :description, :fkIdFLux)';
			$this->connect->executeQuery($requete, array(':heure' => array($heure,PDO::PARAM_STR), ':titre' => array($titre,PDO::PARAM_STR), ':site' => array($site, PDO::PARAM_STR), ':description' => array($description,PDO::PARAM_STR), ':fkIdFLux' => array($fkIdFLux,PDO::PARAM_STR)));
		}
		/**
		 * Méthode permettant de compter le nombre de news
		 * @return int renvoie le nombre de news du programme
		 */
		public function compterLesNews(): int {
			$requete='SELECT COUNT(idNews) FROM news';
			$this->connect->executeQuery($requete, array());
			$resultats = $this->connect->getResults();
			foreach($resultats as $val){
				$nbLigne = $val['COUNT(idNews)'];
				//var_dump($val);
			}
			return $nbLigne;
		}
		/**
		 * Méthode listant toutes les news de la page
		 * @param int $numPageNews Numéro de la page où l'on souhaite lister les news
		 * @return array liste de toutes les news de la page
		 */
		public function listerLesNewsDeLaPage($numPageNews): array{
			$listeNews;
			//echo "$numPageNews";
			$nbLigne = $this->compterLesNews();
			//var_dump($nbLigne);
			$mdlConfig = new ModelConfiguration();
			$nbNewsParPage = $mdlConfig->nombreDeNewsParPage();
			//var_dump($nbNewsParPage);
			//$nbNewsParPage = 10;
			$nbPage = ceil($nbLigne / $nbNewsParPage);
			$requete='SELECT * FROM news ORDER BY heure LIMIT :nbNews OFFSET  :of';
			if ($nbPage == $numPageNews) {
				//echo "Coucou";
				$nbNews = $nbLigne-$nbNewsParPage*($numPageNews-1);
				$this->connect->executeQuery($requete, array(':nbNews' => array($nbNews,PDO::PARAM_INT), ':of' => array(0 ,PDO::PARAM_INT)));
			}
			else{
				$this->connect->executeQuery($requete, array(':nbNews' => array($nbNewsParPage,PDO::PARAM_INT), ':of' => array($nbLigne-($nbNewsParPage) * $numPageNews ,PDO::PARAM_INT)));
			}
			$resultats=$this->connect->getResults();
			foreach ($resultats as $val) {
				$listeNews[]= new News($val['heure'], $val['titre'], $val['site'], $val['description'], $val['fkIdFlux'], $val['idNews']);
			}
			
			return $listeNews;
		
		}
		/**
		 * Méthode permettant de supprimer les news d'un flux
		 * @param string $idflux id du flux à supprimer
		 */
		public function supprimerLesNewsDUnFlux($idFlux){
			$requete = 'DELETE FROM news WHERE fkIdFlux = :id';
			$this->connect->executeQuery($requete, array(':id' => array($idFlux,PDO::PARAM_INT)));
		}



	}
?>