<?php

class Validation {

	static function validateAction($action) {
		if (!isset($action)) {
			throw new Exception("Action manquante !");
		}
	}

	static function validateFormLogin(string &$name, string &$password, array &$Erreurs){
		validateName($name,$Erreur);
		validatePassword($password,$Erreur);
	}

	static function validateFormSignup(string &$name, string &$mail, string &$password, string &$confirmpassword, array &$Erreurs){
		validateName($name, $Erreurs);
		validateMail($mail, $Erreurs);
		validatePassword($password, $Erreurs);
		validateConfirmPassword($password, $confirmpassword, $Erreurs);
	}

	static function validateFormTask(string &$title, string &$description, string &$date, string &$check, array &$Erreurs){
		validateTaskName($title, $Erreurs);
		validateTaskText($description, $Erreurs);
		validateDate($date, $Erreurs);
		validateCheckbox($confirmpassword, $Erreurs);
	}

	/*Functions*/

	public function validateMail(string &$mail, array &$Erreurs){
		if (isset($mail)) {
			$Erreurs[] = "Le mail ne peut être vide";
		} else {
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
				$Erreurs[] = "L\'email n\'est pas valide";
			}
		}
	}

	public function validateCheckbox(string &$check, array &$Erreurs){
		if (isset($check)) {
			$Erreurs[] = "Le nom d\'utilisateur ne peut être vide";
		} else {
			if ($check != 'vrai') {
				$Erreurs[] = "La valeur de la checkbox est invalide";
			}
		}
	}

	public function validateDate(string &$date, array &$Erreurs){
		if (isset($date)) {
			$Erreurs[] = "La date ne peut être vide";
		} else {
			if (!checkdate($date)) {
				$Erreurs[] = "La date n'est pas valide";
			}
		}
	}


	public function validatePassword(string &$password, array &$Erreurs){
		if (isset($password)) {
			$Erreurs[] = "Le mot de passe ne peut être vide";
		} else {
			if (!preg_match('^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $password)) {
				$Erreurs[] = "Le mot de passe n'est pas valide";
			}
			$password = validateString($password);
		}
	}

	public function validateName(string &$name, array &$Erreurs){
		if (isset($name)) {
			$Erreurs[] = "Le pseudo ne peut être vide";
		} else {
			if (!preg_match('^[A-Za-z]{5,25}', $name)) {
				$Erreurs[] = "Le pseudo n'est pas valide";
			}
			$name = validateString($name);
		}
	}

	public function validateConfirmPassword(string &$password, string &$confirmpassword, array &$Erreurs){
		if (isset($confirmpassword)) {
			$Erreurs[] = "Le mot de passe ne peut être vide";
		} else {
			if (!($confirmpassword == $password)) {
				$Erreurs[] = "Le mot de passe n'est pas similaire";
			}
		}

	}

	public function validateTaskName(string &$title, array &$Erreurs){
		if (isset($title)) {
			$Erreurs[] = "Le titre ne peut être vide";
		} else {
			if (!preg_match('^[A-Za-z]{5,50}', $title)) {
				$Erreurs[] = "Le titre n'est pas valide";
			}
			$title = validateString($title);
		}
	}

	public function validateTaskText(string $description, array &$Erreurs){
		$description = validateString($description);
	}

	public static function validateString(string &$chaine){
		return $chaine = filter_var($chaine, FILTER_SANITIZE_STRING);
	}
}
	?>
