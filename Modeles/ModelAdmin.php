<?php
	/**
	 * Classe du model de la configuration
	 * @package  Modeles
	 * @author Antoine Viton, Adrien Coudour
	 */
	class ModelAdmin{

		/**
		 * Méthode de deconexion
		 */
		function deconnexion(){
			session_unset();
			session_destroy();
			$_SESSION = array();
		}
		/**
		 * Méthode de connexion
		 * Vérification du login
		 * Vérification du mot de passe 
		 * @param string $login1 identifiant pour la connexion rentré par l'utilisateur
		 * @param string $motdepasse utilisateur rentré par l'utilisateur
		 * @return bool true si la connexion c'est bien déroulé sinon false
		 */
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
		/**
		 * Vérification si un l'administrateur est connecté
		 * @return bool true si l'administrateur est connecté sinon false
		 */
		function isAdmin(): bool{
			//teste rôle dans la session, retourne instance d’objet ou booleen 
			if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
				//$login=Nettoyer::nettoyer_string($_SESSION[‘login’]);
				//$role=Nettoyer::nettoyer_string($_SESSION[‘role’]);
				return true;
			}
			return false;
		}

		/**
		 * Méthode de récupération de l'admin
		 * @return Admin renvoie l'administrateur connecté
		 */
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