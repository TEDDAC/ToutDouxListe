<?php
class ControllerVisiteur
{

	function __construct()
	{
		if(isset($_GET["action"]))
			$action = Validation::validateString($_GET["action"]);
		else throw new Exception("Vous n'avez demander aucune action.");

		switch ($action) {
			case 'showPublicList':
				$this->showPublicList();
				break;
			case 'showTaskOf':
				$this->showTaskOf();
				break;
			default:
				throw new Exception("L'action ".$action." n'existe pas !");
				break;
		}
	}

	public function showPublicList()
	{
		$listes = ModelVisiteur::getPublicList();
		require("views/showList.php");
	}

	public function showTaskOf()
	{
		$taches = ModelVisiteur::getTaskOf();
		require("views/showTask.php");
	}
}

?>
