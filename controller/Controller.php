<?php
require_once("modele/GWtache.php");
class Controller {
    GWtache $GWtache;
    function __construct(){
        $GWtache = new GWtache();

        $liste = GWtache.getListeById(1);
        require_once("views/showListe.php");
    }
}
?>
