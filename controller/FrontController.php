<?php
class FrontController {
    function __construct(){
		session_start();

		try {
			$actionUser = array("Logout","createlist","removeliste","addeditTask","removetask");
			if(isset($_GET["action"]) and in_array($_GET["action"],$actionUser))
				if(isset($_SESSION["login"]) and $_SESSION["role"] == NULL)
					require("index.php?loginView");
				else $ctrl = new ControllerUtilisateur();
			else $ctrl = new ControllerVisiteur();

		} catch (Exception $e) {
			require("views/erreur.php");
		}

    }
}
?>
