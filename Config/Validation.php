<?php
	class Validation{

		function __construct(){

		}

		function valideChaine($chaine): string{
			$chaine=ltrim($chaine); // enlève tous les espaces à gauche,
			$chaine=rtrim($chaine); // enlève tous les espaces à droite
			if (!isset($chaine)) {
				return "chaine invalide";
			}
			else if ($chaine != filter_var($chaine, FILTER_SANITIZE_STRING)){
				return "Tentative d'injection";
			}
			else return $chaine;
		}

		function valideEmail($email): string{
			if (filter_var($email, FILTER_VALIDATE_EMAIL)){
				return $email;
			}
			else {
				$email="";
				return "Erreur dans l'email";
			}
		}

		function valideAge($age): string{
			if (isset($age) || !filter_var($age,FILTER_SANITIZE_NUMBER_INT)) {
				if ($age >= 0  && $age<150 ) {
					return $age;
				}
				else{
					$age=0;
					return "Erreur age invalide";
				}
			}
			else{
				$age=0;
				return "age non renseigné";
			}

		}
		function validemdp(&$mdp,&$dvueEreur){
			// Partie mot de passe
			$mdp = ltrim($mdp);
			if (!isset($mdp)) {
				$dvueEreur[] = "Rentrez un mot de passe";
			}
			else if ($mdp != filter_var($mdp, FILTER_SANITIZE_STRING)) {
				$dvueEreur[] = "Caractère invalide";
			}
			else if (strlen($mdp) < 8) {
				$dvueEreur[] = " Longueur mot de passe <8";
			}
			$mdp = "";
		}
		function validepseudo(&$pseudo,&$dvueEreur){
			// Partie pseudonyme
			$pseudo=ltrim($pseudo);
			if (!isset($pseudo)){
				$dvueEreur[]= "Rentrer un pseudonyme";
			}
			else if ($pseudo != filter_var($pseudo, FILTER_SANITIZE_STRING)) {
				$dvueEreur[] = " Contient des caractères invalides";
			}
		}
		function valideNbVuePrincipale(&$nbVuePrinc,&$dvueEreur){
	//!filter_var($nom,FILTER_SANITIZE_NUMBER_INT les caractères ne sont pas accepté
			// Partie nombre de vue principale
			if (!isset($nbVuePrinc)){
				$dvueEreur[] = " Rentrer un nombre de vue";
			}
			else if (!filter_var($nbVuePrinc,FILTER_SANITIZE_NUMBER_INT)){
				$dvueEreur[] = " Ne peux pas posséder de caractères";
				}
				else if ($nbVuePrinc<=0){
					$dvueEreur[] = " Le nombre de vue d'une page ne peux pas être inférieur à 1";
				}
		}
	}
?> 