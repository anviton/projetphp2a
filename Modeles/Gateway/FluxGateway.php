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
		public function supprimerUnFlux($id){
			$requete='DELETE FROM flux WHERE idFlux=:id';
			$this->connect->executeQuery($requete, array(':id' => array($id,PDO::PARAM_STR )));
		}
	}



?>