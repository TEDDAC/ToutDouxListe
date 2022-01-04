<?php
class ControllerVisiteur
{

	function __construct()
	{
		if(!isset($_GET["action"])){
			header("Location: index.php");
			return;
		}

		$action = Validation::validateString($_GET["action"]);
		switch ($action) {
			case 'logout':
				$this->LogOut();
				break;
			case 'showTaskOf':
				$this->showTaskOf();
				break;
			case 'pvaddTask':
				$this->addTaskTo();
				break;
			case 'pvremoveTask':
				$this->removeTask();
				break;
			case 'pveditTask':
				$this->editTaskForm();
				break;
			case 'pvupdateTask':
				$this->editTask();
				break;
			case 'pvAddList':
				break;
			case 'pvRemoveList' :
				break;
			case 'pvEditList':
				break;

			default:
				throw new Exception("L'action ".$action." n'existe pas !");
				break;
		}
	}

	public function showTaskOf()
	{
		$taches = ModelVisiteur::getTaskOf();
		$liste = ModelVisiteur::getList();
		require("views/showTask.php");
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

	public function LogOut(){
		ModelUser::logout();
		header('Location: index.php');
	}
}

?>
