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
			if ($nbNewsParPage < 5 || $nbNewsParPage > 50) {
				$nbNewsParPage = 50;
			}
			$requete = 'UPDATE Configuration SET config = :nb WHERE nomElemConfig = :nom';
			$this->connect->executeQuery($requete, array(':nom' => array('nbNewsPage',PDO::PARAM_STR), ':nb' => array($nbNewsParPage,PDO::PARAM_STR)));
		}
	}

?>