<?php
	//require(__DIR__.'/../Metier/News.php');
	class NewsGateway{
		private $connect;

		public function __construct($con){
			$this->connect=$con;
		}

		public function listerToutesLesNews(): array {
			$listeNews;
			$nbLigne;
			$requete='SELECT COUNT(*) FROM news';
			$this->connect->executeQuery($requete, array());
			$resultats = $this->connect->getResults();
			foreach($resultats as $val){
				$nbLigne = $val['COUNT(*)']-1;
			}
			$requete='SELECT * FROM news LIMIT 10';
			$this->connect->executeQuery($requete, array());
			$resultats=$this->connect->getResults();
			foreach ($resultats as $val) {
				$listeNews[]= new News($val['heure'], $val['titre'], $val['site'], $val['description'], $val['fkIdFlux'], $val['idNews']);
			}
			
			return $listeNews;
		}

		public function ajouterUneNews($heure, $titre, $site, $description, $fkIdFLux){
			$heureModif = '2021-12-16'; //(new DateTime($heure))->format(DATE_ATOM);;
			$requete='INSERT INTO news(heure, titre, site, description, fkIdFLux) VALUES(:heure, :titre, :site, :description, :fkIdFLux)';
			$this->connect->executeQuery($requete, array(':heure' => array($heureModif,PDO::PARAM_STR), ':titre' => array($titre,PDO::PARAM_STR), ':site' => array($site, PDO::PARAM_STR), ':description' => array($description,PDO::PARAM_STR), ':fkIdFLux' => array($fkIdFLux,PDO::PARAM_STR)));
		}



	}
?>