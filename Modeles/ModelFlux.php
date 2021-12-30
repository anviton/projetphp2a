<?php

	/**
	 * Classe du model de la configuration
	 * @package  Modeles
	 * @author Antoine Viton, Adrien Coudour
	 */
	class ModelFlux{


		/**
		 * Méthode qui permet de récupérer tous les flux
		 * Connexion base de donnée
		 * Récupération des flux
		 * @return array liste de tous les flux
		 */
		function get_TousLesFlux():array{
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gFlux = new FluxGateway($connect);
			$res = $gFlux->listerTousLesFlux();
			return $res;
		}
		/**
		 * Méthode d'ajout d'un flux 
		 * Connection à la base de donnée
		 * Ajout de ce flux
		 * @param string $lien Chemin du nouveau flux
		 */
		function ajouterFlux($lien){
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gFlux = new FluxGateway($connect);
			$res = $gFlux->ajoutrerUnFlux($lien);
		}
		/**
		 * Méthode de suppresion d'un flux
		 * Connection à la base de donnée
		 * Suppresion du flux
		 * @param string $lien lien du flux que l'on souhaite supprimer
		 */
		function supprimerFlux($lien){
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gFlux = new FluxGateway($connect);
			$res = $gFlux->supprimerUnFlux($lien);
		}

	}