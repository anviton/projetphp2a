<?php

	require_once(__DIR__.'/../Modeles/ModelNews.php');
	require_once(__DIR__.'/../Config/config.php');
	

	class Controleur
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

			//pas d'action, on réinitialise 1er appel
				case NULL:
					$this->init();
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

		function init() {
			global $rep, $vues, $base_url; 
			$modeleNews = new ModelNews();
			$rep = $modeleNews->get_ToutesLesNews();
			require(__DIR__.'/../Vues/pageDAccueil.php');
			//var_dump($rep);
			
		}

	}
$cont = new Controleur();