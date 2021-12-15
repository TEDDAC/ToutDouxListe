<?php
class GWtache {
    private $con;

    public function __construct(){
		require('BDD.php');
		$this->con = new Connection($dsn,$user,$pass);
    }

    public function getUser(int $id){
        $query = "SELECT id,pseudo,mail FROM utilisateur where listeid=:id";
        $this->con->executeQuery($query,array(":id"=>array($id,PDO::PARAM_INT)));
        return $this->con->getResults();
    }

    public function insertUser(string $pseudo, string $mail, string $hash){
        $query = "INSERT INTO utilisateur (pseudo,mail,password) VALUES (:pseudo,:maim,:hash)";
        $this->con->executeQuery($query,array(
            ":pseudo"=>array($pseudo,PDO::PARAM_STRING),
            ":mail"=>array($mail,PDO::PARAM_STRING),
            ":hash"=>array($hash,PDO::PARAM_STRING)
        ));
    }

    public function editUser(string $pseudo, string $mail, string $hash){
        $query = "UPDATE utilisateur SET pseudo=:pseudo,mail=:mail,password=:hash WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":pseudo"=>array($pseudo,PDO::PARAM_STRING),
            ":mail"=>array($mail,PDO::PARAM_STRING),
            ":hash"=>array($hash,PDO::PARAM_STRING)
        ));
    }

    public function deleteUser(int $id){ //insert une tache dans une liste
        $query = "DELETE FROM utilisateur WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":id"=>array($id,PDO::PARAM_INT)
        ));
    }
}
?>
