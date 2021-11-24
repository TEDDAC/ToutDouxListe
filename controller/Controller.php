<?php
require_once("modele/GWtache.php");
require_once("config/Connection.php");
class Controller {
    private $GWtache;
    private $con;

    function __construct(){
        $this->con = new Connection("mysql:host=localhost;dbname=toutdouxliste","root","");
        $this->GWtache = new GWtache($this->con);

        $liste = $this->GWtache->getListeById(2);
        require("views/showListe.php");
    }
}
?>
