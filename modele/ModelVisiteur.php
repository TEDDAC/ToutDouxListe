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

	public static function getTaskOf(){ //récupère les taches de la liste $_GET["idListe"]
		$gwTache = new GWtache();
		$liste = ModelVisiteur::getList();
		return $gwTache->getTaskOf($_GET["idListe"]);
	}

	public static function addTaskTo(){ //ajoute une tache dans la liste d'id $_GET["idListe"]
		$gwTache = new GWtache();
		$liste = ModelVisiteur::getList();
		$titre = Validation::validateTitle($_POST["titre"]);
		$description = Validation::validateString($_POST["description"]);
		$dateFin = Validation::validateDate($_POST["dateFin"]);
		$idListe = $liste->get_id();
		$gwTache->insertTaskIn($titre, $description, $dateFin, $idListe, (isset($_POST["fait"]) && $_POST["fait"]) ? true : false);
	}

	public static function removeTask(){ //supprime la tache d'id $_GET["id"]
		$gwTache = new GWtache();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
		$id = Validation::validateInt($_GET["id"]);
		$gwTache->getTask($id);
		$gwTache->deleteTask($id);
	}

	public static function getTask(){ //récupère la tache d'id $_GET["id"]
		$gwTache = new GWtache();
		$gwListe = new GWliste();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
		$id = Validation::validateInt($_GET["id"]);
		$tache = $gwTache->getTask($id);
		$liste = $gwListe->getList($tache->get_listeId());
		return $tache;
	}

	public static function editTask(){ //modifie la tache d'id $_GET["id"]
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

	public static function getList(){ //récupère la liste d'id $_GET["idListe"]
		$idListe = Validation::validateInt($_GET["idListe"]);
		$liste = ModelVisiteur::checkListById($idListe);
		return $liste;
	}

	public static function createPublicList(){ //créer une liste publique.
		$gwListe = new GWliste();
		$titre = Validation::validateTitle($_POST["titre"]);
		$description = Validation::validateString($_POST["description"]);
		$gwListe->insertListIn($titre, $description, 1, NULL);
		return $gwListe->getLastIdInserted();
	}

	public static function deletePublicList(){ //supprime la liste publique d'id $_GET["idListe"]
		$gwListe = new GWliste();
		$gwTache = new GWtache();
		if(!isset($_GET["idListe"]) || $_GET["idListe"] == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$idListe = Validation::validateInt($_GET["idListe"]);
		$liste = ModelVisiteur::getList($idListe);
		$gwTache->deleteAllTaskOf($idListe);
		$gwListe->deleteList($idListe);
	}

	public static function editPublicList(){ //modifie la liste public d'id $_GET["idListe"]
		$gwListe = new GWliste();
		$liste = ModelVisiteur::checkListById($_GET["idListe"]);
		$liste->set_titre(Validation::validateTitle($_POST["titre"]));
		$liste->set_description(Validation::validateString($_POST["description"]));
		$gwListe->editList($liste->get_id(),$liste->get_titre(),$liste->get_description());
		return $liste;
	}

	public static function checkListById(int $idListe){ //récupère la liste d'id $idListe, et on vérifie les droits
		$gwListe = new GWliste();
		if(!isset($idListe) || $idListe == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$liste = $gwListe->getList($idListe);
		if($liste->get_visibilite() == 0){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
		return $liste;
	}

	public static function createAUser(){ //créer un nouvel utilisateur
		$gwUser = new GWuser();
		$mail = Validation::validateMail($_POST["mail"]);
		if($gwUser->getUser($mail) != NULL) throw new Exception("Email déjà utilisé", 1);
		$username = Validation::validateName($_POST["username"]);
		$password = Validation::validatePassword($_POST["password"]);
		$passwordconfirm = Validation::validateConfirmPassword($password, $_POST["secondpassword"]);
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$gwUser->insertUser($username, $mail, $hash);
	}

	public static function logUser(){ //connect l'utilisateur
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
