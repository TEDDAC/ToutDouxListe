<?php
class FrontController {
    function __construct(){
		session_start();

		try {
			$actionUser = array("Logout",'pvshowTaskOf','pvaddTask','pvremoveTask','pveditTask','pvupdateTask','pvAddList','pvRemoveList','pvEditList','showPrivateList');
			if(isset($_GET["action"]) and in_array($_GET["action"],$actionUser))
				if(!isset($_SESSION["userid"])){
					require("views/login.php");
				} else $ctrl = new ControllerUtilisateur();
			else $ctrl = new ControllerVisiteur();

		} catch (Exception $e) {
			require("views/erreur.php");
		}

    }
}
?>
