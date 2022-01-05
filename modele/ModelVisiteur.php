<?php
class ModelVisiteur
{
	public function __construct()
	{

	}

	public static function getPublicList(){
		$gw = new GWliste();
		return $gw->getPublicList();
	}

	//récupère les taches de la liste $_GET["idListe"]
	public static function getTaskOf(){
		$gwTache = new GWtache();
		$liste = ModelVisiteur::getList();
		return $gwTache->getTaskOf($_GET["idListe"]);
	}

	//ajoute une tache dans la liste d'id $_GET["idListe"]
	public static function addTaskTo(){ //ajoute une tache dans la liste d'id $_GET["idListe"]
		$gwTache = new GWtache();
		$liste = ModelVisiteur::getList();
		$titre = Validation::validateTitle($_POST["titre"]);
		$description = Validation::validateString($_POST["description"]);
		$dateFin = Validation::validateDate($_POST["dateFin"]);
		$idListe = $liste->get_id();
		$gwTache->insertTaskIn($titre, $description, $dateFin, $idListe, (isset($_POST["fait"]) && $_POST["fait"]) ? true : false);
	}

	//supprime la tache d'id $_GET["id"]
	public static function removeTask(){
		$gwTache = new GWtache();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
		$id = Validation::validateInt($_GET["id"]);
		$gwTache->getTask($id);
		$gwTache->deleteTask($id);
	}

 	//récupère la tache d'id $_GET["id"]
	public static function getTask(){
		$gwTache = new GWtache();
		$gwListe = new GWliste();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
		$id = Validation::validateInt($_GET["id"]);
		$tache = $gwTache->getTask($id);
		$liste = $gwListe->getList($tache->get_listeId());
		return $tache;
	}

	//modifie la tache d'id $_GET["id"]
	public static function editTask(){
		$gwTache = new GWtache();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Aucune tache n'est choisi");
		$id = Validation::validateInt($_GET["id"]);
		$tache = $gwTache->getTask($id);
		$liste = ModelVisiteur::checkListById(Validation::ValidateInt($tache->get_listeId()));
		$tache->set_titre(Validation::validateTitle($_POST["titre"]));
		$tache->set_description(Validation::validateString($_POST["description"]));
		$tache->set_dateFin(Validation::validateDate($_POST["dateFin"]));
		$tache->set_fait((isset($_POST["fait"]) && $_POST["fait"] == true) ? true : false);
		$gwTache->editTask($tache->get_id(),$tache->get_titre(),$tache->get_description(),$tache->get_dateFin(),$tache->isDone());
		return $tache;
	}

	//récupère la liste d'id $_GET["idListe"]
	public static function getList(){
		$idListe = Validation::validateInt($_GET["idListe"]);
		$liste = ModelVisiteur::checkListById($idListe);
		return $liste;
	}

	//créer une liste publique.
	public static function createPublicList(){
		$gwListe = new GWliste();
		$titre = Validation::validateTitle($_POST["titre"]);
		$description = Validation::validateString($_POST["description"]);
		$gwListe->insertListIn($titre, $description, 1, NULL);
		return $gwListe->getLastIdInserted();
	}

	//supprime la liste publique d'id $_GET["idListe"]
	public static function deletePublicList(){
		$gwListe = new GWliste();
		$gwTache = new GWtache();
		if(!isset($_GET["idListe"]) || $_GET["idListe"] == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$idListe = Validation::validateInt($_GET["idListe"]);
		$liste = ModelVisiteur::getList($idListe);
		$gwTache->deleteAllTaskOf($idListe);
		$gwListe->deleteList($idListe);
	}

	//modifie la liste publique d'id $_GET["idListe"]
	public static function editPublicList(){
		$gwListe = new GWliste();
		$liste = ModelVisiteur::checkListById($_GET["idListe"]);
		$liste->set_titre(Validation::validateTitle($_POST["titre"]));
		$liste->set_description(Validation::validateString($_POST["description"]));
		$gwListe->editList($liste->get_id(),$liste->get_titre(),$liste->get_description());
		return $liste;
	}

	//récupère la liste d'id $idListe, et on vérifie les droits
	public static function checkListById(int $idListe){
		$gwListe = new GWliste();
		if(!isset($idListe) || $idListe == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$liste = $gwListe->getList($idListe);
		if($liste->get_visibilite() == 0){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
		return $liste;
	}

	//créer un nouvel utilisateur
	public static function createAUser(){
		$gwUser = new GWuser();
		$mail = Validation::validateMail($_POST["mail"]);
		if($gwUser->getUser($mail) != NULL) throw new Exception("Email déjà utilisé", 1);
		$username = Validation::validateName($_POST["username"]);
		$password = Validation::validatePassword($_POST["password"]);
		$passwordconfirm = Validation::validateConfirmPassword($password, $_POST["secondpassword"]);
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$gwUser->insertUser($username, $mail, $hash);
	}

	//connecte l'utilisateur
	public static function logUser(){
		$gwUser = new GWuser();
		$mail = Validation::validateMail($_POST["mail"]);
		$password = Validation::validatePassword($_POST["password"]);
		$utilisateur = $gwUser->getUser($mail);
		if($utilisateur == NULL) throw new Exception("Email inconnu", 1);
		password_verify($password,$utilisateur->get_password());
		$_SESSION['userid'] = $utilisateur->get_id();
	}
}

?>
