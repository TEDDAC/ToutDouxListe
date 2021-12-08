<?php
require_once("config/Connection.php");
require_once("modele/class/Liste.php");
class GWliste {
    private Connection $con;

    function __construct(Connection $con){
        $this->con = $con;
    }

	public function getListOf(int $id){ //retourne les listes de l'utilisateur id (si id = 0 est vide, la fonction retournera les listes publiques)
		$query = "SELECT id,titre,description,couleur,userid FROM liste where userid=:id";
		$this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
		$tab = [];
		foreach ($this->con->getResults() as $liste) {
			$tab[] = new Liste($liste["id"],$liste["titre"],$liste["couleur"],$liste["visibilite"],$liste["userid"]);
		}
		return $tab;
	}

	public function getPublicList(){ //retourne les listes de l'utilisateur id (si id = 0 est vide, la fonction retournera les listes publiques)
		$query = "SELECT id,titre,description,couleur,userid FROM liste where visibilite=1";
		$this->con->executeQuery();
		return $this->con->getResults();
	}

	public function getList(int $id){
        $query = "SELECT id,titre,description,couleur FROM tache where id=:id";
        $this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)))
        return $this->con->getResults();
    }

    public function insertListIn(string $titre, string $description, string $couleur, int $userid){
        $query = "INSERT INTO liste (titre,description,couleur,userid) VALUES (:titre,:description,:couleur,:userid)";
        $this->con->executeQuery($query,array(
            ":titre"=>array($titre,PDO::PARAM_STRING),
            ":description"=>array($description,PDO::PARAM_STRING),
            ":couleur"=>array($couleur,PDO::PARAM_STRING),
            ":userid"=>array($userid,PDO::PARAM_INT)
        ));
    }

    public function editList(int $id,string $titre, string $description, string $couleur){
        $query = "UPDATE liste SET titre=:titre,description=:description,couleur=:couleur WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":titre"=>array($titre,PDO::PARAM_STRING),
            ":description"=>array($description,PDO::PARAM_STRING),
            ":couleur"=>array($couleur,PDO::PARAM_STRING),
            ":id"=>array($id,PDO::PARAM_INT)
        ));
    }

    public function deleteList(int $id){
        $query = "DELETE FROM liste WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":id"=>array($id,PDO::PARAM_INT)
        ));
    }
}
?>
