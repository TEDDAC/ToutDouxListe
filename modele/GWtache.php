<?php
require_once("config/Connection.php");
require_once("class/Tache");
class GWtache {
    Connection $con;

    function __construct(Connection $con){
        $this->con = $con;
    }

    /*function ajouterTache(){ //retourne les tache de la liste
        $query = "INSERT INTO taches(titre,description,dateFin,)";
    }*/

    function getListeById(int $id):Liste{ //retourne les tache de la liste
        $query = "SELECT * FROM liste where id=:id";
        $con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
        foreach($con->getResults() as $row){
            $tabTache = new Tache($row["id"],$row["titre"],$row["description"],$row["dateFin"],$id);
        }
        return $tabTache;

}
?>
