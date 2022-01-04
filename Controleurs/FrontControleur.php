<?php
	
	/**
	 * Class Front controleur
	 * @package Controleurs 
	 * @author Antoine Viton, Adrien Coudour
	 */
	class FrontControleur
	{
		/**
		 * Constructeur du Front Controleur
		 * Recupération des exceptions et redirection selon l'action lancé par l'utilisateur
		 */
		function __construct() {
			global $rep, $vues;
			$listeAction_Admin= array('deconnecter','supprimer', 'ajouter', 'modifNbNews', 'mettreAJour');
			// on démarre ou reprend la session
			session_start();

			//on initialise un tableau d'erreur
			$dVueEreur = array ();
			$mdlAdmin = new ModelAdmin();
			try{
				$admin = $mdlAdmin->isAdmin(); 
				$action=$_REQUEST['action'] ?? null;
				//var_dump($action);
				$validation = new Validation();
				$bool = $validation->valideChaine($action, $dVueEreur);
				if ($bool){ 
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
				}
				else{
					require(__DIR__.'/../Vues/VueErreurs.php');
				} 
			}catch (PDOException $e){
				//si erreur BD, pas le cas ici
				$dVueEreur[] =	"Erreur inattendue!!! ";
				require(__DIR__.'/../Vues/VueErreurs.php');
				//require ($rep.$vues['erreur']);

			}
			catch (Exception $e2){
				$dVueEreur[] =	"Erreur inattendue!!! ";
				require(__DIR__.'/../Vues/VueErreurs.php');
				//require ($rep.$vues['erreur']);
			}


			//fin
			exit(0);
		}//fin constructeur

	}