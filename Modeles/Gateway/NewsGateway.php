<?php
	//require(__DIR__.'/../Metier/News.php');
	class NewsGateway{
		private $connect;

		public function __construct($con){
			$this->connect=$con;
		}

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

		public function ajouterUneNews($heure, $titre, $site, $description, $fkIdFLux){
			//$heureModif = '2021-12-16'; //(new DateTime($heure))->format(DATE_ATOM);;
			$requete='INSERT INTO news(heure, titre, site, description, fkIdFLux) VALUES(:heure, :titre, :site, :description, :fkIdFLux)';
			$this->connect->executeQuery($requete, array(':heure' => array($heure,PDO::PARAM_STR), ':titre' => array($titre,PDO::PARAM_STR), ':site' => array($site, PDO::PARAM_STR), ':description' => array($description,PDO::PARAM_STR), ':fkIdFLux' => array($fkIdFLux,PDO::PARAM_STR)));
		}

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

		public function listerLesNewsDeLaPage($numPageNews): array{
			$listeNews;
			//echo "$numPageNews";
			$nbLigne = $this->compterLesNews();
			var_dump($nbLigne);
			$mdlConfig = new ModelConfiguration();
			$nbNewsParPage = $mdlConfig->nombreDeNewsParPage();
			//var_dump($nbNewsParPage);
			//$nbNewsParPage = 10;
			$nbPage = ceil($nbLigne / $nbNewsParPage);
			$requete='SELECT * FROM news LIMIT :nbNews OFFSET  :of';
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

		public function supprimerLesNewsDUnFlux($idFlux){
			$requete = 'DELETE FROM news WHERE fkIdFlux = :id';
			$this->connect->executeQuery($requete, array(':id' => array($idFlux,PDO::PARAM_INT)));
		}



	}
?>