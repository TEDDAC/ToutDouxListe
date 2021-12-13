<?php
class ControllerVisiteur
{

	function __construct()
	{
		if(isset($_GET["action"]))
			$action = Validation::ValidateString($_GET["action"]);
		else $action = NULL;

		switch ($action) {
			case 'showPublicList':
				$this->showPublicList();
				break;
			default:
				$this->showPublicList();
				break;
		}
	}

	function showliste()
	{
		$liste = ModelVisiteur::getTaskOf();
		require("views/showListe.php");
	}

	function showPublicList()
	{
		$model = new ModelVisiteur();
		$liste = $model.getPublicList();
		require("show");
	}
}

?>
