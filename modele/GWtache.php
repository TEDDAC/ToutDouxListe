<?php
require_once("class/Tache.php");
class GWtache {
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    /*function ajouterTache(){ //retourne les tache de la liste
        $query = "INSERT INTO taches(titre,description,dateFin,)";
    }*/

    public function getListeById(int $id){ //retourne les taches de la liste
        $query = "SELECT id,titre,description,DATE_FORMAT(dateFin,'%d-%M-%Y %i:%H') dateFin FROM tache where id=:id";
        $this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
        foreach($this->con->getResults() as $row){
            var_dump($row);
            $tabTache = new Tache($row["id"],$row["titre"],$row["description"],$row["dateFin"],$id);
        }
        return $tabTache;
    }
}
?>
