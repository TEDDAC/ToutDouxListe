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
			case 'formlog':
				$this->logUser();
				break;
			case 'formcreate':
				$this->createAccount();
				break;
			case 'login':
				require("views/login.php");
				break;
			case 'signup':
				require("views/signup.php");
				break;
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
			case 'addPublicListForm':
				require("views/formAddEditList.php");
				break;
			case 'addPublicList':
				$this->createPublicList();
				break;
			case 'deletePublicList':
				$this->deletePublicList();
				break;
			case 'editPublicListForm':
				$this->editPublicListForm();
				break;
			case 'editPublicList':
				$this->editPublicList();
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
		$liste = ModelVisiteur::getList();
		require("views/showTask.php");
	}

	public function showInsertTaskForm(){
		require("views/ajoutEditTache.php");
	}

	public function addTaskTo(){
		ModelVisiteur::addTaskTo();
		header('Location: index.php?action=showTaskOf&idListe='.$_GET["idListe"]);
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
		header('Location: index.php?action=showTaskOf&idListe='.$tache->get_listeId());
	}

	public function createPublicList(){
		$idListe = ModelVisiteur::createPublicList();
		header('Location: index.php?action=showTaskOf&idListe='.$idListe);
	}

	public function deletePublicList(){
		ModelVisiteur::deletePublicList();
		header('Location: index.php?action=showPublicList');
	}

	public function editPublicListForm(){
		$liste = ModelVisiteur::getList();
		require("views/formAddEditList.php");
	}

	public function editPublicList(){
		$liste = ModelVisiteur::editPublicList();
		header('Location: index.php?action=showTaskOf&idListe='.$liste->get_id());
	}

	public function createAccount(){
		ModelVisiteur::createAUser();
		header('Location: index.php?action=formlog');
	}

	public function logUser(){
		ModelVisiteur::logUser();
		header('Location: index.php');
	}
}

?>
