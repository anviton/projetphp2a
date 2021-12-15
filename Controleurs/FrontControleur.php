<?php

	/*require_once(__DIR__.'/../Modeles/ModelNews.php');
	require_once(__DIR__.'/../Config/config.php');
	require_once(__DIR__.'/../Modeles/ModelAdmin.php');
	require_once(__DIR__.'/ControleurUser.php');*/
	

	class FrontControleur
	{
		
		function __construct() {
			global $rep, $vues;
			$listeAction_Admin= array('deconnecter','supprimer', 'ajouter');
			// on démarre ou reprend la session
			session_start();

			//debut

			//on initialise un tableau d'erreur
			$dVueEreur = array ();
			$mdlAdmin = new ModelAdmin();
			try{
				$admin = $mdlAdmin->isAdmin(); 
				$action=$_REQUEST['action'] ?? null;
				if(in_array($action, $listeAction_Admin)) {
					if ($admin == false) {
						require(__DIR__.'/../Vues/connexionAdmin.php');
					}
					else{
						 new ControleurAdmin();
					}
				}
				else{
					new ControleurUser();
				}
			}catch (PDOException $e){
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

	}