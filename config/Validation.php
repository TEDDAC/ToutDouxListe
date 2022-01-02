<?php

class Validation {
	public static function validateMail($mail){
		if ($mail == NULL) {
			throw new Exception("Le mail ne peut être vide");
		} else {
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
				throw new Exception("L'email '".$mail."' n'est pas valide");
			}
		}
	}

	public static function validatePassword($password){
		if ($password == NULL) {
			throw new Exception("Le mot de passe ne peut être vide");
		} else {
			if (!preg_match('^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $password)) {
				throw new Exception("Le mot de passe n'est pas valide");
			}
			return Validation::validateString($password);
		}
	}

	public static function validateConfirmPassword(string $password, string $confirmpassword){
		if ($confirmpassword == NULL) {
			throw new Exception("Le mot de passe ne peut être vide");
		} else {
			if (!($confirmpassword == $password)) {
				throw new Exception("Le mot de passe n'est pas similaire");
			}
		}
	}

	public static function validateTitle(string $title){ //sert pour les taches et les listes
		if ($title == NULL) {
			throw new Exception("Le titre ne peut être vide");
		} else {
			/*if (!preg_match('[a-zA-Z0-9].{4,50}', $title)) {
				throw new Exception("Le titre '".$title."' n'est pas valide. Le titre doit contenir au moins 5 caractère, et doit commencer par une lettre ou un chiffre.");
			}*/
			return Validation::validateString($title);
		}
	}

	public static function validateDate(string $date){ //les dates sont sous la forme "année-mois-jourTheure:minute"
		/*if (!preg_match("^([0-9]-){2}[0-9]T[0-9]:[0-9]$", $date)) {
			throw new Exception("La date n'est pas valide");
		}*/
		return $date;
	}

	public static function validateString(string $chaine){
		if(filter_var($chaine, FILTER_SANITIZE_STRING) != $chaine) throw new Exception("La chaine '".$chaine."' n'est pas valide.");
		return $chaine;
	}

	public static function validateInt(string $int){
		if(filter_var($int, FILTER_SANITIZE_NUMBER_INT) != $int) throw new Exception("Le nombre '".$int."' n'est pas valide.");
		return $int;
	}
}
	?>
