<?php

	//namespace modeles;

	require_once(__DIR__.'/Connection.php');
	require_once(__DIR__.'/Gateway/AdminGateway.php');
	require_once(__DIR__.'/Metier/Admin.php');
	//require_once(__DIR__.'/../Config/config.php');

	class ModelAdmin{

		//constructeur
		//vide

		function deconnexion(){
			session_unset();
			session_destroy();
			$_SESSION = array();
		}

		function connexion($login, $motDePasse){
			$valide = new Validation();
			$valide->validemdp($motDePasse, $dVueEreur);
			$valide->validepseudo($pseudo, $dVueEreur);

			$res=$gAdmin->selectionnerUnAdmin($login, $motDePasse);
			$_SESSION['role']='admin';
			$_SESSION['login']=$login;
		}

		function isAdmin(){
			//teste rôle dans la session, retourne instance d’objet ou booleen 
			if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
				//$login=Nettoyer::nettoyer_string($_SESSION[‘login’]);
				//$role=Nettoyer::nettoyer_string($_SESSION[‘role’]);
				return new Admin($login,$role);
			}
				else return null;
			}

		function get_unAdmin($loginRech): Admin {
			//$login="anviton";
			//$mdp="VitonMyAdmin";
			//$dbs="mysql:host=localhost;dbname=dbanviton";
			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gAdmin = new AdminGateway($connect);
			$res = $gAdmin->selectionnerUnAdmin($loginRech);
			return $res;
		}

	//fin modèles
	}