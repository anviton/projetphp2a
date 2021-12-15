<?php
	//require(__DIR__.'/../Metier/News.php');
	class NewsGateway{
		private $connect;

		public function __construct($con){
			$this->connect=$con;
		}

		public function listerToutesLesNews(): array {
			$listeNews;
			$requete='SELECT * FROM news';
			$this->connect->executeQuery($requete, array());
			$resultats=$this->connect->getResults();
			foreach ($resultats as $val) {
				$listeNews[]= new News($val['heure'], $val['titre'], $val['site'], $val['description'], $val['fkIdFlux'], $val['idNews']);
			}
			
			return $listeNews;
		}

		public function ajouterUneNews($heure, $titre, $site, $description, $fkIdFLux){
			$requete='INSERT INTO news(heure, titre, site, description, fkIdFLux) VALUES(:heure, :titre, :site, :description, :fkIdFLux)';
			$this->connect->executeQuery($requete, array(':heure' => array($heure,PDO::PARAM_STR), ':titre' => array($titre,PDO::PARAM_STR), ':site' => array($site, PDO::PARAM_STR), ':description' => array($description,PDO::PARAM_STR), ':fkIdFLux' => array($fkIdFLux,PDO::PARAM_STR)));
		}



	}
?>