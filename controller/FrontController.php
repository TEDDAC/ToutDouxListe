<?php
class FrontController {
    function __construct(){
		session_start();

		try {
			$actionUser = array("logout",'pvshowTaskOf','pvaddTask','pvremoveTask','pveditTask','pvupdateTask','pvAddList','pvRemoveList','pvEditListForm','showPrivateList','pvEditList');
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
