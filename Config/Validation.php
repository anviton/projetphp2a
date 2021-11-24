<?php
	class Validation{

		function __construct(){

		}

		function valideChaine($chaine): string{
			if (isset($chaine)) {
				return $chaine;
			}
			else {
				return "chaine invalide";
			}
		}

		





















		function valideEmail($email): string{
			if (filter_var($email, FILTER_VALIDATE_EMAIL)){
				return $email;
			}
			else {
				return "Erreur dans l'email";
			}
		}

		function valideAge($age): string{
			if (isset($age)) {
				if ($age >= 0  && $age<150 ) {
					return $age;
				}
				else{
					return "Erreur age invalide";
				}
			}
			else{
				return "age non renseigné";
			}
		}


	}
?> 