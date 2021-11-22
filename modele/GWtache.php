<?php
require_once("config/Connection.php");
require_once("class/Tache");
class GWtache {
    Connection $con;

    function __construct(Connection $con){
        $this->con = $con;
    }

    function ajouterTache(){ //retourne les tache de la liste
        $query = "INSERT INTO taches(titre,description,dateFin,)";
    }
}
?>
