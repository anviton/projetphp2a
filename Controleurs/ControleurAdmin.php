<?php

	/*require_once(__DIR__.'/../Modeles/ModelFlux.php');
	require_once(__DIR__.'/../Config/config.php');
	require_once(__DIR__.'/../Config/Validation.php');*/
	

	class ControleurAdmin
	{
		
		function __construct() {
			global $rep, $vues; 
			// on démarre ou reprend la session
			//session_start();


			//debut

			//on initialise un tableau d'erreur
			$dVueEreur = array ();

			try{
			$action=$_REQUEST['action'] ?? null;
			
			//var_dump($action);
			switch($action) {

				case "supprimer":
					$this->supprimer();
					break;

				case "ajouter":
					$this->ajouter();
					break;

				case 'modifNbNews':
					$this->modifierLeNombreDeNews();
					break;

				case "mettreAJour":
					$this->mettreAJour();
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
				$dVueEreur[] =	"Erreur inattendue de la base!!! ";
				require(__DIR__.'/../Vues/VueErreurs.php');
				//require ($rep.$vues['erreur']);

			}
			catch (Exception $e2){
				$dVueEreur[] =	"Erreur inattendue!!! ";
				require(__DIR__.'/../Vues/VueErreurs.php');
				//require ($rep.$vues['erreur']);
			}
		}

		function ajouter(){
			$flux = $_REQUEST['flux'] ?? null;
			$mdlFlux = new ModelFlux();
			$mdlFlux->ajouterFlux($flux);
			$rep = $mdlFlux->get_TousLesFlux();
			require(__DIR__.'/../Vues/VueAdmin.php');
		}

		function supprimer(){
			$flux = $_REQUEST['flux'] ?? null;
			var_dump($flux);
			if ($flux == null) {
				require($rep.$vues['erreur']);
			}
			$mdlNews = new ModelNews();
			$mdlFlux = new ModelFlux();
			$mdlNews->supprimerNews($flux);
			$mdlFlux->supprimerFlux($flux);
			$rep = $mdlFlux->get_TousLesFlux();
			require(__DIR__.'/../Vues/VueAdmin.php');
		}

		function modifierLeNombreDeNews(){
			$nbNews = $_REQUEST['nbNews'] ?? null;
			$mdlConfig = new ModelConfiguration();
			$mdlConfig->modifierLeNombreDeNews($nbNews);
			$mdlFlux = new ModelFlux();
			$rep = $mdlFlux->get_TousLesFlux();
			require(__DIR__.'/../Vues/VueAdmin.php');
		}

		function mettreAJour(){
			require(__DIR__.'/../test.php');
			$mdlFlux = new ModelFlux();
			$rep = $mdlFlux->get_TousLesFlux();
			require(__DIR__.'/../Vues/VueAdmin.php');
		}

	}

//$cont = new ControleurUser();