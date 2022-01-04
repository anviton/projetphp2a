<?php
	
	/**
	 * Class controleur utilisateur
	 * @package Controleurs 
	 * @author Antoine Viton, Adrien Coudour
	 */
	class ControleurUser
	{
		/**
		 * Constructeur du controleur Utilisateur
		 * Recupération des exceptions et redirection selon l'action lancé par l'utilisateur
		 */
		function __construct() {
			global $rep, $vues; 
			// on démarre ou reprend la session


			//debut

			//on initialise un tableau d'erreur
			$dVueEreur = array ();

			try{
			$action=$_REQUEST['action'] ?? null;
			switch($action) {

			//pas d'action, on réinitialise 1er appel
				case NULL:
					$this->init();
					break;

				case "connexion":
					$this->initConnexion();
					break;

				case "tentativeConnexion":
					$this->tentativeConnexion();
				break;


				case "deconnexion":
					$this->deconnexion();
					break;

				case "validationFormulaire":
					//$this->ValidationFormulaire($dVueEreur);
					break;
				

				//mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require(__DIR__.'/../Vues/VueErreurs.php');
					//require ($rep.$vues['vuephp1']);
					break;
			}

			} catch (PDOException $e){
				//si erreur BD, pas le cas ici
				$dVueEreur[] =	"Erreur inattendue!!! ";
				//require ($rep.$vues['erreur']);

			}
			catch (Exception $e2){
				$dVueEreur[] =	"Erreur inattendue!!! ";
				//require ($rep.$vues['erreur']);
			}


			//fin
			exit(0);
		}//fin constructeur

		/**
		 * Méthode de l'initialisation de la connexion
		 * Vérification du rôle de l'utilisateur
		 * Redirection vers la vue Admin ou de la connexion si l'utilisateur n'est pas connecté
		 */
		function initConnexion(){
			global $base_url;
			if (isset($_SESSION['role'])) {
				$mdlFlux = new ModelFlux();
				$rep = $mdlFlux->get_TousLesFlux();
				require(__DIR__.'/../Vues/VueAdmin.php');
			}
			else{
				require(__DIR__.'/../Vues/connexionAdmin.php');
			}
		}

		/**
		 * Méthode de tentative de connexion
		 * Récupération du mot de passe et du pseudonyme par un formulaire
		 * Validation du mot de passe et du pseudo
		 * Tentative de connexion en tant qu'administrateur
		 */
		function tentativeConnexion(){
			$mdlAdmin = new ModelAdmin();
			$motDePasse = $_REQUEST['motDePasse'] ?? null;
			$pseudo = $_REQUEST['pseudo'] ?? null;

			$valide = new Validation();
			$valide->validemdp($motDePasse, $dVueEreur);
			$valide->validepseudo($pseudo, $dVueEreur);

			$err = $mdlAdmin->connexion($pseudo, $motDePasse);
			if($err == true){
				$mdlFlux = new ModelFlux();
				$rep = $mdlFlux->get_TousLesFlux();
				require(__DIR__.'/../Vues/VueAdmin.php');
			}
			else{
				$dVueEreur[] = "Erreur mot de passe ou login";
				require(__DIR__.'/../Vues/connexionAdmin.php');
			}

		}

		/**
		 * Méthode d'initialisation
		 * Définition de la page de la news affiché
		 * Redirection vers la page d'accueil
		 */
		function init() {
			global $rep, $vues /*, $base_url*/; 
			$modeleNews = new ModelNews();
			$nbNews = $modeleNews->nombreDeNews();
			$mdlConfig = new ModelConfiguration();
			$nbNewsParPage = $mdlConfig->nombreDeNewsParPage();
			$nbPagePasArrondi = $nbNews / $nbNewsParPage;
			$nbPage = ceil($nbPagePasArrondi);
			$numPageNews = $_REQUEST['numPageNews'] ?? null;
			if (!isset($numPageNews) || $numPageNews > $nbPage || $numPageNews < 1) {
				$numPageNews = 1;
			}
			$rep = $modeleNews->getNewsPage($numPageNews);
			$rep = array_reverse($rep);
			require(__DIR__.'/../Vues/pageDAccueil.php');			
		}
		/**
		 * Méthode de déconnexion de l'administrateur
		 */
		function deconnexion(){
			if (isset($_SESSION['role'])) {
				$mdlAdmin = new ModelAdmin();
				$mdlAdmin->deconnexion();
			}
			$this->init();
		}

	}
//$cont = new ControleurUser();
?>