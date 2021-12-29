<?php

	//namespace modeles;

	/*require_once(__DIR__.'/Connection.php');
	require_once(__DIR__.'/Gateway/NewsGateway.php');
	require_once(__DIR__.'/../Config/config.php');*/

	class ModelNews{

		//constructeur
		//vide


		public function get_ToutesLesNews():array{
			//$login="anviton";
			//$mdp="VitonMyAdmin";
			//$dbs="mysql:host=localhost;dbname=dbanviton";
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gNews = new NewsGateway($connect);
			$res = $gNews->listerToutesLesNews();
			return $res;
		}

		public function getNewsPage($numPageNews) : array {
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gNews = new NewsGateway($connect);
			$res = $gNews->listerLesNewsDeLaPage($numPageNews);
			return $res;
		}

		public function nombreDeNews(): int{
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gNews = new NewsGateway($connect);
			$res = $gNews->compterLesNews();
			return $res;
		}

		public function supprimerNews($id){
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gNews = new NewsGateway($connect);
			$gNews->supprimerLesNewsDUnFlux($id);
		}

	//fin modèles
	}