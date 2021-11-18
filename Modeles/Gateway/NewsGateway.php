<?php
	require('Modeles/Metier/News.php');
	class NewsGateway{
		private $connect;

		public function __construct($con){
			$this->connect=$con;
		}

		public function listerToutesLesNews(): array {
			$listeNews;
			$requete='SELECT * FROM news';
			$this->connect->executeQuery($requete, array());
			$resultats=$connect->getResults();
			foreach ($resultats as $val) {
				$listeNews[]= new News($val['idNews'], $val['heure'], $val['titre'], $val['site'], $val['description'], $val['fkIdFlux']);
			}
			return $listeNews;
		}

		public function ajouterUneNews($news){
			$requete='INSERT INTO news(heure, titre, site, description, fkIdFLux VALUES(:heure, :titre, :site, :description, :fkIdFLux)';
			$this->connect->executeQuery($requete, array(':heure' => array($news->heure,PDO::PARAM_STR ), ':titre' => array($news->titre,PDO::PARAM_STR ), ':site' => array($news->site,PDO::PARAM_STR ), ':description' => array($news->description,PDO::PARAM_STR ), ':fkIdFLux' => array($news->fkIdFLux,PDO::PARAM_STR )));
		}



	}
?>