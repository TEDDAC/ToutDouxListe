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

	public static function getTaskOf(){
		$gwTache = new GWtache();
		$gwListe = new GWliste();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$_GET["id"] = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
		$liste = $gwListe->getList($_GET["id"]);
		if($liste->get_visibilite() == 0){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
		return $gwTache->getTaskOf($_GET["id"]);
	}

	public static function addTaskTo(){ //AUCUNE VALIDATION DES CHAMPS N'EST FAITE: A FAIRE+++++++++++++++++++++
		$gwTache = new GWtache();
		$gwListe = new GWliste();
		if(!isset($_GET["idListe"]) || $_GET["idListe"] == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$_GET["idListe"] = filter_var($_GET["idListe"], FILTER_SANITIZE_NUMBER_INT);
		$liste = $gwListe->getList($_GET["idListe"]);
		if($liste->get_visibilite() == 0){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
		$gwTache->insertTaskIn($_POST["titre"], $_POST["description"], $_POST["dateFin"], $_GET["idListe"], (isset($_POST["fait"]) && $_POST["fait"]) ? true : false);
	}

	public static function removeTask(){
		$gwTache = new GWtache();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
		$gwTache->deleteTask(filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT));
	}

	public static function getTask(){
		$gwTache = new GWtache();
		$gwListe = new GWliste();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Il n'y a aucune tache spécifié.");
		$tache = $gwTache->getTask(filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT));
		$liste = $gwListe->getList($tache->get_listeId());
		if($liste->get_visibilite() == 0) throw new Exception("Vous n'avez pas accès à cette liste !");
		return $tache;
	}

	public static function editTask(){ //IDEM ++++++++++++++++++++++++++++
		$gwTache = new GWtache();
		$gwListe = new GWliste();
		if(!isset($_GET["id"]) || $_GET["id"] == NULL) throw new Exception("Aucune tache n'est choisi");
		$_GET["id"] = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
		$tache = $gwTache->getTask($_GET["id"]);
		$liste = $gwListe->getList($tache->get_listeId());
		if($liste->get_visibilite() == 0){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
		$tache->set_titre($_POST["titre"]);
		$tache->set_description($_POST["description"]);
		$tache->set_dateFin($_POST["dateFin"]);
		$tache->set_fait((isset($_POST["fait"]) && $_POST["fait"]) ? true : false);
		$gwTache->editTask($tache->get_id(),$tache->get_titre(),$tache->get_description(),$tache->get_dateFin(),$tache->isDone());
		return $tache;
	}
}

?>
