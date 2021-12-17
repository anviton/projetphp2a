<?php

	//namespace modeles;

	//require_once(__DIR__.'/Connection.php');
	//require_once(__DIR__.'/Gateway/FluxGateway.php');
	//require_once(__DIR__.'/../Config/config.php');

	class ModelFlux{

		//constructeur
		//vide


		function get_TousLesFlux():array{
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gFlux = new FluxGateway($connect);
			$res = $gFlux->listerTousLesFlux();
			return $res;
		}

		function ajouterFlux($lien){
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gFlux = new FluxGateway($connect);
			$res = $gFlux->ajoutrerUnFlux($lien);
		}

		function supprimerFlux($lien){
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gFlux = new FluxGateway($connect);
			$res = $gFlux->supprimerUnFlux($lien);
		}

	//fin modèles
	}