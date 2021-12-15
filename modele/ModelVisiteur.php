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

	public static function addTaskTo(){
		$gwTache = new GWtache();
		$gwListe = new GWliste();
		if(!isset($_GET["idListe"]) || $_GET["idListe"] == NULL) throw new Exception("Il n'y a aucune liste cible.");
		$_GET["idListe"] = filter_var($_GET["idListe"], FILTER_SANITIZE_NUMBER_INT);
		$liste = $gwListe->getList($_GET["idListe"]);
		if($liste->get_visibilite() == 0){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
		$gwTache->insertTaskIn($_POST["titre"], $_POST["description"], $_POST["dateFin"], $_GET["idListe"]);
	}
}

?>
