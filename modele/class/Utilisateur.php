<?php

class Utilisateur {
    private $id;
    private $pseudo;
    private $mail;
    private $password;

    function __construct($id, $pseudo, $mail, $password){
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->password = $password;
    }

    function set_id($id){
        $this->id = $id;
    }

    function get_id() {
        return $this->id;
    }

    function set_pseudo() {
        $this->pseudo = $pseudo;
    }

    function get_pseudo() {
        return $this->pseudo;
    }

    function set_mail(){
        $this->mail = $mail;
    }

    function get_mail(){
        return $this->mail;
    }

    function set_password(){
         $this->password = $password;
    }

    function get_password(){
        return $this->password;
    }
}
?>
