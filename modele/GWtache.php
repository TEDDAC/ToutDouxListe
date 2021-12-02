<?php
require_once("modele/class/Tache.php");
class GWtache {
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function getTaskOf(int $id){ //retourne les taches de la liste
        $query = "SELECT id,titre,description,DATE_FORMAT(dateFin,'%d-%M-%Y %i:%H') dateFin FROM tache where listeid=:id";
        $this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
        $tabTache = array();
        foreach($this->con->getResults() as $row){
            $tabTache[] = new Tache($row["id"],$row["titre"],$row["description"],$row["dateFin"],$id);
        }
        return $tabTache;
    }

    /*public function getTask(int $id){ //retourne une tache, sert pour pré remplir les champs quand on édite une tache
        $query = "SELECT id,titre,description,DATE_FORMAT(dateFin,'%d-%M-%Y %i:%H') dateFin FROM tache where listeid=:id";
        $this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)))
        return $this->con->getResults();
    }

    public function insertTaskIn(string $titre, string $description, string $dateFin, int $idListe){ //insert une tache dans une liste
        $query = "INSERT INTO tache (titre,description,dateFin,listid) VALUES (:titre,:description,STR_TO_DATE(:dateFin,'%d-%M-%Y %i:%H'),:listeid)";
        $this->con->executeQuery($query,array(
            ":titre"=>array($titre,PDO::PARAM_STRING),
            ":description"=>array($description,PDO::PARAM_STRING),
            ":dateFin"=>array($dateFin,PDO::PARAM_STRING),
            ":listeid"=>array($idListe,PDO::PARAM_INT)
        ));
    }

    public function editTask(int $id,string $titre, string $description, string $dateFin){ //insert une tache dans une liste
        $query = "UPDATE tache (titre,description,dateFin) SET titre=titre,description=:description,dateFin=STR_TO_DATE(:dateFin,'%d-%M-%Y %i:%H') WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":titre"=>array($titre,PDO::PARAM_STRING),
            ":description"=>array($description,PDO::PARAM_STRING),
            ":dateFin"=>array($dateFin,PDO::PARAM_STRING),
            ":id"=>array($id,PDO::PARAM_INT)
        ));
    }

    public function deleteTask(int $id){ //insert une tache dans une liste
        $query = "DELETE FROM tache WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":id"=>array($id,PDO::PARAM_INT)
        ));
    }*/
}
?>
