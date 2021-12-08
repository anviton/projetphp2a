<?php

	//namespace modeles;

	//require_once(__DIR__.'/Connection.php');
	//require_once(__DIR__.'/Gateway/NewsGateway.php');
	//require_once(__DIR__.'/../Config/config.php');

	class ModelNews{

		//constructeur
		//vide


		function get_ToutesLesNews():array{
			//$login="anviton";
			//$mdp="VitonMyAdmin";
			//$dbs="mysql:host=localhost;dbname=dbanviton";
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gNews = new NewsGateway($connect);
			$res = $gNews->listerToutesLesNews();
			return $res;
		}

	//fin modèles
	}