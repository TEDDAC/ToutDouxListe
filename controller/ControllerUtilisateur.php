<?php
class ControllerUtilisateur
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
			case 'pvshowTaskOf':
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
			case 'addPrivateList':
				$this->createPrivateList();
				break;
			case 'pvRemoveList':
				$this->removePrivateList();
				break;
			case 'pvEditListForm':
				$this->editPrivateListForm();
				break;
			case 'showPrivateList':
				$this->showPrivateList();
				break;
			case 'pvEditList':
				$this->editPrivateList();
				break;
			case 'pvAddListForm':
				require("views/formAddEditList.php");
				break;

			default:
				throw new Exception("L'action ".$action." n'existe pas !");
				break;
		}
	}

	public function showTaskOf()
	{
		$liste = ModelUser::getList();
		$taches = ModelUser::getTaskOf();
		require("views/showTask.php");
	}

	public function addTaskTo(){
		ModelUser::addTaskTo();
		header('Location: index.php?action=pvshowTaskOf&idListe='.$_GET["idListe"]);
	}

	public function removeTask(){
		ModelUser::removeTask();
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	public function editTaskForm(){
		$tache = ModelUser::getTask();
		require("views/ajoutEditTache.php");
	}

	public function editTask(){
		$tache = ModelUser::editTask();
		header('Location: index.php?action=pvshowTaskOf&idListe='.$tache->get_listeId());
	}

	public function createPrivateList(){
		$idListe = ModelUser::createPrivateList();
		header('Location: index.php?action=pvshowTaskOf&idListe='.$idListe);
	}

	public function removePrivateList(){
		ModelUser::deletePrivateList();
		header('Location: index.php?action=showPrivateList&userid='.$_SESSION["userid"]);
	}

	public function editPrivateListForm(){
		$liste = ModelUser::getList();
		require("views/formAddEditList.php");
	}

	public function editPrivateList(){
		$liste = ModelUser::editPrivateList();
		header('Location: index.php?action=pvshowTaskOf&idListe='.$liste->get_id());
	}

	public function showPrivateList()
	{
		$listes = ModelUser::getPrivateList();
		require("views/showList.php");
	}

	public function LogOut(){
		ModelUser::logout();
		header('Location: index.php');
	}
}

?>
