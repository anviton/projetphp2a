<?php
	
	//require(__DIR__.'/../Metier/Flux.php');
	class FluxGateway{
		
		private $connect;

		public function __construct($con){
			$this->connect=$con;
		}

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

		public function ajoutrerUnFlux($nom){
			$date=strftime("%y-%m-%d");
			//$date="2021-11-18";
			$requete='INSERT INTO flux(nom, dateDerMaj) VALUES(:nom, :dateDerMaj)';
			$this->connect->executeQuery($requete, array(':nom' => array($nom,PDO::PARAM_STR ), ':dateDerMaj' => array($date,PDO::PARAM_STR )));
		}
		public function supprimerUnFlux($nom){
			$requete='DELETE FROM flux WHERE nom=:nomFlux';
			$this->connect->executeQuery($requete, array(':nomFlux' => array($nom,PDO::PARAM_STR )));
		}
	}



?>