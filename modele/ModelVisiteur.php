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
		$_GET["id"] = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
		$liste = $gwListe->getList($_GET["id"]);
		if($liste->get_visibilite() == 0){ throw new Exception("Vous n'avez pas accès à cette liste !"); }
		return $gwTache->getTaskOf($_GET["id"]);
	}
}

?>
