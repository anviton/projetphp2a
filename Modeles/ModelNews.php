<?php

	//namespace modeles;

	require_once(__DIR__.'/Connection.php');
	require_once(__DIR__.'/Gateway/NewsGateway.php');


	class ModelNews{

		//constructeur
		//vide


		function get_ToutesLesNews():array{
			$login="anviton";
			$mdp="VitonMyAdmin";
			$dbs="mysql:host=localhost;dbname=dbanviton";
			$connect = new Connection($dbs, $login, $mdp);
			$gNews = new NewsGateway($connect);
			$res = $gNews->listerToutesLesNews();
			return $res;
		}

	//fin modèles
	}