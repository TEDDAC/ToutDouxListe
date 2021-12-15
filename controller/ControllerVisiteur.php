<?php
class ControllerVisiteur
{

	function __construct()
	{
		if(isset($_GET["action"]))
			$action = Validation::validateString($_GET["action"]);
		else $action = NULL;

		switch ($action) {
			case 'showPublicList':
				$this->showPublicList();
				break;
			default:
				$Erreurs = array("Erreur 404: l'action ".$action." n'existe pas.");
				require("views/erreur.php");
				break;
		}
	}

	public function showliste()
	{
		$liste = ModelVisiteur::getTaskOf();
		require("views/showList.php");
	}

	public function showPublicList()
	{
		$model = new ModelVisiteur();
		$listes = ModelVisiteur::getPublicList();
		require("views/showList.php");
	}
}

?>
