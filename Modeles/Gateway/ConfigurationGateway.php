<?php
	class ConfigurationGateway{
		private $connect;

		public function __construct($con){
			$this->connect=$con;
		}

		public function connaitreLeNbDeNewsParPage(){
			$requete='SELECT * FROM Configuration WHERE nomElemConfig = :nom';
			$this->connect->executeQuery($requete, array(':nom' => array('nbNewsPage',PDO::PARAM_STR)));
			$resultats = $this->connect->getResults();
			foreach($resultats as $val){
				$nbNewsParPage = $val['config'];
			}
			return $nbNewsParPage;
		}

		public function modifierLeNbDeNews($nbNewsParPage){
			$gNews = new NewsGateway($this->connect);
			$nbNews = $gNews->compterLesNews();
			if ($nbNewsParPage > $nbNews) {
				$nbNewsParPage = $nbNews;
			}
			if ($nbNewsParPage < 1) {
				$nbNewsParPage = $this->connaitreLeNbDeNewsParPage();
			}
			$requete = 'UPDATE Configuration SET config = :nb WHERE nomElemConfig = :nom';
			$this->connect->executeQuery($requete, array(':nom' => array('nbNewsPage',PDO::PARAM_STR), ':nb' => array($nbNewsParPage,PDO::PARAM_STR)));
		}
	}

?>