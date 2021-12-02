<?php
require_once("modele/GWtache.php");
require_once("config/Connection.php");
class Controller {
    private $GWtache;
    private $con;

    function __construct($dsn,$user,$pass){
        $this->con = new Connection($dsn,$user,$pass);
        $this->GWtache = new GWtache($this->con);

        $liste = $this->GWtache->getTaskOf(3);
        require("views/showListe.php");
    }
}
?>
