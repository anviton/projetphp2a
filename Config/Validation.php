<?php
	/**
	 * Classe de Validation des chaînes rentrée par l'utilisateur ou admin
	 * @package Config
	 * @author Antoine Viton, Adrien Coudour
	 */
	class Validation{

		function __construct(){

		}
		/**
		 * Validation d'une chaîne de caractère quelconque
		 * @param string $chaine Chaîne que l'on souhaite vérifier/ valider
		 * @return string chaîne filtrer et modifié ou message d'erreur
		 */
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
		/**
		 * Validation d'une adresse mail
		 * @param string $email Chaine de caractère que l'on souhaite vérifié
		 * @return string email vérifié ou message d'erreur
		 */
		function valideEmail($email): string{
			if (filter_var($email, FILTER_VALIDATE_EMAIL)){
				return $email;
			}
			else {
				$email="";
				return "Erreur dans l'email";
			}
		}
		/**
		 * Validation d'un age
		 * @param int $age Age que l'on souhaite vérifié
		 * @return string l'âge vérifié ou message d'erreur
		 */
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
		/**
		 *  Validation d'un mot de passe
		 * @param string $mdp mot de passe rentré par l'utilisateur que l'on souhaite validé
		 * @param array $dvueEreur tableau de l'erreur avec le message d'erreur
		 */
		static function validemdp(&$mdp,&$dvueEreur){
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
			//$mdp = "";
		}
		/**
		 * Validation d'un pseudonyme 
		 * @param string $pseudo pseudonyme rentré par l'utilisateur que l'on souhaite vérifié
		 * @param array $dvueEreur tableau d'erreur avec le message d'erreur
		 */
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
		/**
		 * Validation du nombre de vue que l'on souhaite avoir sur une page
		 * @param string $nbVuePrinc Nombre de veu que l'on souhaite valider
		 * @param array $dvueEreur Message d'erreur si il y en a l'utilité
		 */
		function valideNbVuePrincipale(&$nbVuePrinc,&$dvueEreur){
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
		/**
		 * Méthode de validation d'une date en base de donnée
		 * @param string $date
		 * @param string $format
		 * @return bool true si la date est valide sinon false
		 */
		function validateDate($date, $format = 'Y-m-d H:i:s'){
			$d = DateTime::createFromFormat($format, $date);
			return $d && $d->format($format) == $date;
		}
		/**
		 * Méthode de validation d'un flux
		 * @param string $flux flux à tester et a valider
		 * @param array $dvueEreur message d'erreur si il y a un problème
		 */
		function valideAjoutFlux(&$flux,&$dvueEreur):bool{
			if (!filter_var($flux, FILTER_VALIDATE_URL)){
				$dvueEreur[] = " Flux invalide ";
				return false;
			}
			else if (!isset($flux)){
				$dvueEreur[] = " Rentrer un nom de flux à ajouter";
				return false;
			}
			return true;
		}
	}
?> 