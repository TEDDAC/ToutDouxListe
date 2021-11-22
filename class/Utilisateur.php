<?php

class Utilisateur {
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $password;

    function __construct(int $id, string $nom, string $prenom, string $mail, string $password) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
    }

    function set_id($id){
        $this->id = $id;
    }

    function get_id() {
        return $this->id;
    }

    function set_nom($nom){
        $this->nom = $nom;
    }

    function get_nom() {
        return $this->nom;
    }

    function set_prenom($prenom){
        $this->prenom = $prenom;
    }

    function get_prenom() {
        return $this->prenom;
    }

    function set_mail($mail){
        $this->mail = $mail;
    }

    function get_mail() {
        return $this->mail;
    }

    function set_password($password){
        $this->password = $password;
    }

    function get_password() {
        return $this->password;
    }
}

?>
