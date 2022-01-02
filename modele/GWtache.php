<?php
class GWtache {
    private $con;

    public function __construct(){
		require('BDD.php');
		$this->con = new Connection($dsn,$user,$pass);
    }

    public function getTaskOf(int $id){ //retourne les taches de la liste
        $query = "SELECT id,titre,description,fait,DATE_FORMAT(dateFin,'%d-%M-%Y %H:%i') dateFin,listeid FROM tache where listeid=:id";
        $this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
		$tab = array(); //il faut instancier le tableau, sinon le return ne le trouve pas
		foreach ($this->con->getResults() as $tache) {
			$tab[] = new Tache($tache["id"],$tache["titre"],$tache["description"],$tache["fait"],$tache["dateFin"],$tache["listeid"]);
		}
		return $tab;
    }

    public function getTask(int $id){ //retourne une tache, sert pour pré remplir les champs quand on édite une tache
        $query = "SELECT id,titre,description,fait,DATE_FORMAT(dateFin,'%Y-%m-%d %H:%i') dateFin,listeid FROM tache where id=:id";
        $this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
		$result = $this->con->getResults();
		$tache = $result[0];
		return new Tache($tache["id"],$tache["titre"],$tache["description"],$tache["fait"],$tache["dateFin"],$tache["listeid"]);
    }

    public function insertTaskIn(string $titre, string $description, string $dateFin, int $idListe, bool $fait){ //insert une tache dans une liste
		$query = "INSERT INTO tache (titre,description,dateFin,listeid,fait) VALUES (:titre,:description,STR_TO_DATE(:dateFin,'%Y-%m-%d %H:%i'),:listeid,:fait)";
        $this->con->executeQuery($query,array(
            ":titre"=>array($titre,PDO::PARAM_STR),
            ":description"=>array($description,PDO::PARAM_STR),
            ":dateFin"=>array(str_replace("T"," ",$dateFin),PDO::PARAM_STR),
            ":listeid"=>array($idListe,PDO::PARAM_INT),
			":fait"=>array($fait,PDO::PARAM_INT)
        ));
    }

	public function editTask(int $id, string $titre, string $description, string $dateFin, bool $fait){ //insert une tache dans une liste
		$query = "UPDATE tache SET titre=:titre,description=:description,dateFin=STR_TO_DATE(:dateFin,'%Y-%m-%d %H:%i'),fait=:fait WHERE id=:id";
        $this->con->executeQuery($query,array(
			":id"=>array($id,PDO::PARAM_INT),
            ":titre"=>array($titre,PDO::PARAM_STR),
            ":description"=>array($description,PDO::PARAM_STR),
            ":dateFin"=>array(str_replace("T"," ",$dateFin),PDO::PARAM_STR),
			":fait"=>array($fait,PDO::PARAM_INT)
        ));
    }

    public function deleteTask(int $id){ //insert une tache dans une liste
        $query = "DELETE FROM tache WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":id"=>array($id,PDO::PARAM_INT)
        ));
    }

	public function deleteAllTaskOf(int $idListe){
		$query = "DELETE FROM tache WHERE listeid=:idListe";
		$this->con->executeQuery($query,array(
            ":idListe"=>array($idListe,PDO::PARAM_INT)
        ));
	}
}
?>
