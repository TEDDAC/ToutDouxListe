<?php
/**
 *
 */
class ModelVisiteur
{
	function __construct(argument)
	{

	}

	public static function getPublicList(){
		$con = new GWliste();
		return $con->getPublicList();
	}
}

?>
