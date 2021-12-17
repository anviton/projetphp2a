<?php

	//namespace modeles;

	/*require_once(__DIR__.'/Connection.php');
	require_once(__DIR__.'/Gateway/AdminGateway.php');
	require_once(__DIR__.'/Metier/Admin.php');
	//require_once(__DIR__.'/../Config/config.php');*/

	class ModelAdmin{

		//constructeur
		//vide

		function deconnexion(){
			session_unset();
			session_destroy();
			$_SESSION = array();
		}

		function connexion($login1, $motDePasse):bool { // a corriger
			

			global $login, $dbs, $mdp;
			$connect = new Connection($dbs, $login, $mdp);
			$gAdmin = new AdminGateway($connect);
			$res=$gAdmin->selectionnerUnAdmin($login1);
			if($res == null){
				return false;
			}
			$password = $res->mdp;
			//var_dump($motDePasse);
			//var_dump($password);
			if (password_verify($motDePasse, $password)) {
			//if ($motDePasse == $password) {
				$_SESSION['role']='admin';
				$_SESSION['login']=$login1;
				return true;
			}
			else{
				return false;
			}
		}

		/*function isAdmin(): Admin{
			//teste rôle dans la session, retourne instance d’objet ou booleen 
			if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
				//$login=Nettoyer::nettoyer_string($_SESSION[‘login’]);
				//$role=Nettoyer::nettoyer_string($_SESSION[‘role’]);
				return new Admin($login);
			}
			return NULL;
		}*/

		function isAdmin(): bool{
			//teste rôle dans la session, retourne instance d’objet ou booleen 
			if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
				//$login=Nettoyer::nettoyer_string($_SESSION[‘login’]);
				//$role=Nettoyer::nettoyer_string($_SESSION[‘role’]);
				return true;
			}
			return false;
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