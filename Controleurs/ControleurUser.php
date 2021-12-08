<?php

	//require_once(__DIR__.'/../Modeles/ModelFlux.php');
	//require_once(__DIR__.'/../Config/config.php');
	//require_once(__DIR__.'/../Config/Validation.php');
	

	class ControleurUser
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

				case "connexion":
					$this->initConnexion();
					break;

				case "tentativeConnexion":
					$this->tentativeConnexion();
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

		function initConnexion(){
			global $base_url;
			require(__DIR__.'/../Vues/connexionAdmin.php');
		}

		function tentativeConnexion(){
			global $base_url, $mdp, $login;
			$motDePasse = $_REQUEST['motDePasse'] ?? null;
			$pseudo = $_REQUEST['pseudo'] ?? null;
			$valide = new Validation();
			$valide->validemdp($motDePasse, $dVueEreur);
			//var_dump($pseudo);
			$valide->validepseudo($pseudo, $dVueEreur);
			//var_dump($pseudo);
			//var_dump($motDePasse);

			if ($pseudo != $login) {
				$dVueEreur[] = "Erreur login";
				require(__DIR__.'/../Vues/connexionAdmin.php');
			}
			elseif ($motDePasse != $mdp) {
				$dVueEreur[] = "Erreur motDePasse";
				require(__DIR__.'/../Vues/connexionAdmin.php');
			}
			else{
				session_start();
				$modeleFlux = new ModelFlux();
				$rep = $modeleFlux->get_TousLesFlux();
				require(__DIR__.'/../Vues/VueAdmin.php');
			}
		}

	}

//$cont = new ControleurUser();