<?php
	class News{
		private $idNews;
		private $heure;
		private $titre;
		private $site;
		public $description;
		public $fkIdFlux;

		function __construct($idNews, $heure, $titre, $site, $description, $fkIdFlux){
			$this->idNews=$idNews;
			$this->heure=$heure;
			$this->titre=$titre;
			$this->site=$site;
			$this->description=$description;
			$this->fkIdFlux=$fkIdFlux;
		}

		function __toString(){
			return $this->heure." ".$this->titre." ".$this->site." ".$this->description;
		}
	}
?>