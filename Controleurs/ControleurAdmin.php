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
				require ($rep.$vues['erreur']);

			}
			catch (Exception $e2){
				$dVueEreur[] =	"Erreur inattendue!!! ";
				require ($rep.$vues['erreur']);
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
			//var_dump($flux);
			$mdlFlux = new ModelFlux();
			$mdlFlux->supprimerFlux($flux);
			$rep = $mdlFlux->get_TousLesFlux();
			require(__DIR__.'/../Vues/VueAdmin.php');
		}

	}

//$cont = new ControleurUser();