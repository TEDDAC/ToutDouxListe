<?php
class FrontController {
    function __construct(){
		session_start();

		try {
			$actionUser = array("Logout");
			if(isset($_GET["action"]) and in_array($_GET["action"],$actionUser))
				if(isset($_SESSION["userid"]))
					require("index.php?loginView");
				else $ctrl = new ControllerUtilisateur();
			else $ctrl = new ControllerVisiteur();

		} catch (Exception $e) {
			require("views/erreur.php");
		}

    }
}
?>
