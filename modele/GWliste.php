<?php
class GWliste {
	private $con;

	function __construct(){
		require('BDD.php');
		$this->con = new Connection($dsn,$user,$pass);
    }

	public function getListOf(int $id){ //retourne les listes de l'utilisateur id (si id = 0 est vide, la fonction retournera les listes publiques)
		$query = "SELECT id,titre,description,visibilite,userid FROM liste where userid=:id";
		$this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
		$tab = [];
		foreach ($this->con->getResults() as $liste) {
			$tab[] = new Liste($liste["id"],$liste["titre"],$liste["description"],$liste["visibilite"],$liste["userid"]);
		}
		return $tab;
	}

	public function getPublicList(){ //retourne les listes de l'utilisateur id (si id = 0 est vide, la fonction retournera les listes publiques)
		$query = "SELECT id,titre,description,visibilite,userid FROM liste where visibilite=1";
		$this->con->executeQuery($query);
		foreach ($this->con->getResults() as $liste) {
			$tab[] = new Liste($liste["id"],$liste["titre"],$liste["description"],$liste["visibilite"],$liste["userid"]);
		}
		return $tab;
	}

	public function getList(int $id){
        $query = "SELECT id,titre,description,visibilite,userid FROM liste where id=:id";
        $this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
        $result = $this->con->getResults();
		$liste = $result[0];
		return new Liste($liste["id"],$liste["titre"],$liste["description"],$liste["visibilite"],$liste["userid"]);
    }

    public function insertListIn(string $titre, string $description, string $visibilite, $userid){
        $query = "INSERT INTO liste (titre,description,visibilite,userid) VALUES (:titre,:description,:visibilite,:userid)";
        $this->con->executeQuery($query,array(
            ":titre"=>array($titre,PDO::PARAM_STR),
            ":description"=>array($description,PDO::PARAM_STR),
            ":visibilite"=>array($visibilite,PDO::PARAM_STR),
            ":userid"=>array($userid,PDO::PARAM_INT)
        ));
    }

    public function editList(int $id,string $titre,string $description, string $couleur, string $visibilite){
        $query = "UPDATE liste SET titre=:titre,description=:description,visibilite=:visibilite WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":titre"=>array($titre,PDO::PARAM_STR),
            ":description"=>array($description,PDO::PARAM_STR),
            ":visibilite"=>array($visibilite,PDO::PARAM_STR),
            ":id"=>array($id,PDO::PARAM_INT)
        ));
    }

    public function deleteList(int $id){
        $query = "DELETE FROM liste WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":id"=>array($id,PDO::PARAM_INT)
        ));
    }

	public function getLastIdInserted(){
		$this->con->executeQuery("SELECT LAST_INSERT_ID()",array());
		$result = $this->con->getResults();
		return $result[0][0];
	}
}
?>
