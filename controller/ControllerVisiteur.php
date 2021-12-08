<?php
class ControllerVisiteur
{

	function __construct()
	{

	}

	static function showliste()
	{
		$model = new ModelUser();
		$liste = $model.getTaskOf();
		require("views/showListe.php");
	}
}

?>
