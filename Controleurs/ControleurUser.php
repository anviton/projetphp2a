<?php

	/*require_once(__DIR__.'/../Modeles/ModelNews.php');
	require_once(__DIR__.'/../Modeles/ModelAdmin.php');
	require_once(__DIR__.'/../Config/config.php');*/
	

	class ControleurUser
	{
		
		function __construct() {
			global $rep, $vues; 
			// on démarre ou reprend la session


			//debut

			//on initialise un tableau d'erreur
			$dVueEreur = array ();

			try{
			$action=$_REQUEST['action'] ?? null;
			//var_dump($action);
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

		function initConnexion(){
			global $base_url;
			require(__DIR__.'/../Vues/connexionAdmin.php');
		}

		function tentativeConnexion(){
			$mdlAdmin = new ModelAdmin();
			$motDePasse = $_REQUEST['motDePasse'] ?? null;
			$pseudo = $_REQUEST['pseudo'] ?? null;
			//echo "totot";
			//var_dump($err);
			var_dump($motDePasse);
			var_dump($pseudo);
			$err = $mdlAdmin->connexion($pseudo, $motDePasse);
			var_dump($err);
			if($err == true){
				require(__DIR__.'/../Vues/VueAdmin.php');
			}
			else{
				//echo "totot2";
				$dVueEreur[] = "Erreur mot de passe ou login";
				require(__DIR__.'/../Vues/connexionAdmin.php');
			}

		}


		function init() {
			global $rep, $vues /*, $base_url*/; 
			$modeleNews = new ModelNews();
			//$modeleNews = new \Modeles\pageDAccueil();
			$rep = $modeleNews->get_ToutesLesNews();
			require(__DIR__.'/../Vues/pageDAccueil.php');
			//require($rep.$vues['accueil']);
			//var_dump($rep);
			
		}

	}
//$cont = new ControleurUser();
?>