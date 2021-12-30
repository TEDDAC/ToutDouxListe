<?php
class ControllerVisiteur
{

	function __construct()
	{
		if(!isset($_GET["action"])){
			$this->showPublicList();
			return;
		}

		$action = Validation::validateString($_GET["action"]);
		switch ($action) {
			case 'showPublicList':
				$this->showPublicList();
				break;
			case 'showTaskOf':
				$this->showTaskOf();
				break;
			case 'insertTaskForm':
				$this->showInsertTaskForm();
				break;
			case 'addTask':
				$this->addTaskTo();
				break;
			case 'removeTask':
				$this->removeTask();
				break;
			case 'editTask':
				$this->editTaskForm();
				break;
			case 'updateTask':
				$this->editTask();
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

	public function showInsertTaskForm(){
		require("views/ajoutEditTache.php");
	}

	public function addTaskTo(){
		ModelVisiteur::addTaskTo();
		header('Location: index.php?action=showTaskOf&id='.$_GET["idListe"]);
	}

	public function removeTask(){
		ModelVisiteur::removeTask();
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	public function editTaskForm(){
		$tache = ModelVisiteur::getTask();
		require("views/ajoutEditTache.php");
	}

	public function editTask(){
		$tache = ModelVisiteur::editTask();
		header('Location: index.php?action=showTaskOf&id='.$tache->get_listeId());
	}
}

?>
