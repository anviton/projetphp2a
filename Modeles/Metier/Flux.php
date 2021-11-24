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

		public function __get($name){
			switch ($name) {
				case 'idFlux':
					return $this->idFlux;
					break;
				case 'titre':
					return $this->titre;
					break;
				case 'dateDerMaj':
					return $this->dateDerMaj;
					break;
				default:
					return null;
					break;
			}
		}
	}
?>