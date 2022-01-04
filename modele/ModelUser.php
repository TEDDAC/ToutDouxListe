<?php
class ModelUser
{
	public function __construct()
	{

	}

	public static function getTaskOf(){
		$gwTache = new GWtache();
		$liste = ModelUser::getList();
		return $gwTache->getTaskOf($_GET["idListe"]);
	}

	public static function addTaskTo(){
		$gwTache = new GWtache();
		$liste = ModelUser::getList();
		$titre = Validation::validateTitle($_POST["titre"]);
		$description = Validation::validateString($_POST["description"]);
		$dateFin = Validation::validateDate($_POST["dateFin"]);
		$idListe = $liste->get_id();
		$gwTache->insertTaskIn($titre, $description, $dateFin, $idListe, (isset($_POST["fait"]) && $_POST["fait"]) ? true : false);
	}

	public static function removeTask(){
		$gwTache = new GWtache();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
		$id = Validation::validateInt($_GET["id"]);
		$gwTache->getTask($id);
		$gwTache->deleteTask($id);
	}

	public static function getTask(){
		$gwTache = new GWtache();
		$gwListe = new GWliste();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
		$id = Validation::validateInt($_GET["id"]);
		$tache = $gwTache->getTask($id);
		$liste = $gwListe->getList($tache->get_listeId());
		return $tache;
	}

	public static function editTask(){
		$gwTache = new GWtache();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Aucune tache n'est choisi");
		$id = Validation::validateInt($_GET["id"]);
		$tache = $gwTache->getTask($id);
		$liste = ModelUser::checkListById(Validation::ValidateInt($tache->get_listeId()));
		$tache->set_titre(Validation::validateTitle($_POST["titre"]));
		$tache->set_description(Validation::validateString($_POST["description"]));
		$tache->set_dateFin(Validation::validateDate($_POST["dateFin"]));
		$tache->set_fait((isset($_POST["fait"]) && $_POST["fait"] == true) ? true : false);
		$gwTache->editTask($tache->get_id(),$tache->get_titre(),$tache->get_description(),$tache->get_dateFin(),$tache->isDone());
		return $tache;
	}

	public static function getList(){
		$idListe = Validation::validateInt($_GET["idListe"]);
		$liste = ModelUser::checkListById($idListe);
		return $liste;
	}

	public static function createPrivateList(){
		if(isset($_SESSION["userid"]) and $_SESSION["userid"] == NULL) throw new Exception("Vous n'êtes pas connecer", 1);
		$gwListe = new GWliste();
		$titre = Validation::validateTitle($_POST["titre"]);
		$description = Validation::validateString($_POST["description"]);
		$gwListe->insertListIn($titre, $description, 0, $_SESSION["userid"]);
		return $gwListe->getLastIdInserted();
	}

	public static function deletePublicList(){
		$gwListe = new GWliste();
		$gwTache = new GWtache();
		if(!isset($_GET["idListe"]) || $_GET["idListe"] == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$idListe = Validation::validateInt($_GET["idListe"]);
		$liste = $gwListe->getList($idListe);
		$gwTache->deleteAllTaskOf($idListe);
		$gwListe->deleteList($idListe);
	}

	public static function editPrivateList(){
		$gwListe = new GWliste();
		$liste = ModelUser::getList($_GET["idListe"]);
		$liste->set_titre(Validation::validateTitle($_POST["titre"]));
		$liste->set_description(Validation::validateString($_POST["description"]));
		$gwListe->editList($liste->get_id(),$liste->get_titre(),$liste->get_description());
		return $liste;
	}

	public static function checkListById(int $idListe){
		$gwListe = new GWliste();
		if(!isset($idListe) || $idListe == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$liste = $gwListe->getList($idListe);
		if($liste->get_visibilite() == 0 and $liste->get_userid() != $_SESSION["userid"]){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
		return $liste;
	}

	public static function createAUser(){
		$gwUser = new GWuser();
		$mail = Validation::validateMail($_POST["mail"]);
		$username = Validation::validateName($_POST["username"]);
		$password = Validation::validatePassword($_POST["password"]);
		$passwordconfirm = Validation::validateConfirmPassword($password, $_POST["secondpassword"]);
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$gwUser->insertUser($username, $mail, $hash);
	}

	public static function logUser(){
		$gwUser = new GWuser();
		throw new Exception($_POST["mail"]);
		$mail = Validation::validateMail($_POST["mail"]);
		$password = Validation::validatePassword($_POST["password"]);
		$utilisateur = $gwUser->getUser($mail);
		password_verify($password,$utilisateur->get_password());
		$_SESSION['userid'] = $utilisateur->get_id();
	}

	public static function getPrivateList(){
		if(!isset($_SESSION["userid"]) && $_SESSION["userid"] == NULL) throw new Exception("Vous n'êtes pas connecté.", 1);
		$userid = Validation::validateInt($_SESSION["userid"]);
		$gwListe = new GWliste();
		return $gwListe->getListOf($userid);
	}

	public static function logout(){
		if (session_unset() == false) {
			throw new Exception("Problème avec la fermeture de session !");
		}
	}
}

?>
