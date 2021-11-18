<?php
	class Flux{
		private $idFlux;
		private $titre;
		private $dateDerMaj;


		function __construct($idFlux, $titre, $dateDerMaj){
			$this->idFlux=$idFlux;
			$this->titre=$titre;
			$this->dateDerMaj=$dateDerMaj;
			
		}

		function __toString(){
			return $this->idFlux." ".$this->titre;
		}
	}
?>