<?php
require_once("GWliste.php")
require_once("GWuser.php")

class ModelUser {

    private $tab_instances_public = getPublicList();
    private $liste_instance = getList();

    function __construct() {
        $gwlist = new GWliste();
        $gwuser = new GWuser();$

    }

    function checkuser(){
        if (count(getUser($_SESSION["iduser"])) == 0) {
            throw new Exception("L'utilisateur n'existe pas !");
        }
    }

    function return_listes() {
        $tab_liste = getListOf();
        return $tab_liste;
    }


    function return_liste() {
        $liste = getList();
        return $liste;
    }
}


?>
