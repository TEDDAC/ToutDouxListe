<?php
class GWUser {
    private $con;

    public function __construct(){
		require('config/BDD.php');
		$this->con = new Connection($dsn,$user,$pass);
    }

    public function getUser(string $mail){
        $query = "SELECT id,pseudo,mail,password FROM utilisateur where mail=:mail";
        $this->con->executeQuery($query,array(":mail"=>array($mail,PDO::PARAM_STR)));
        $result = $this->con->getResults();
        if(count($result) == 0) return NULL;
        $user = $result[0];
        return new Utilisateur($user["id"], $user["pseudo"], $user["mail"], $user["password"]);
    }

    public function insertUser(string $pseudo, string $mail, string $hash){
        $query = "INSERT INTO utilisateur (pseudo,mail,password) VALUES (:pseudo,:mail,:hash)";
        $this->con->executeQuery($query,array(
            ":pseudo"=>array($pseudo,PDO::PARAM_STR),
            ":mail"=>array($mail,PDO::PARAM_STR),
            ":hash"=>array($hash,PDO::PARAM_STR)
        ));
    }

    public function editUser(string $pseudo, string $mail, string $hash){
        $query = "UPDATE utilisateur SET pseudo=:pseudo,mail=:mail,password=:hash WHERE id=:id";
        $this->con->executeQuery($query,array(
            ":pseudo"=>array($pseudo,PDO::PARAM_STR),
            ":mail"=>array($mail,PDO::PARAM_STR),
            ":hash"=>array($hash,PDO::PARAM_STR)
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
