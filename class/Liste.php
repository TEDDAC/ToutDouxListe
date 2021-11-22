<?php

class Liste {
    private $id;
    private $titre;
    private $couleur;
    private $visibilite;

    function set_id($id){
        $this->id = $id;
    }

    function get_id() {
        return $this->id;
    }

    function set_titre($titre){
        $this->titre = $titre;
    }

    function get_titre() {
        return $this->titre;
    }

    function set_couleur($couleur){
        $this->couleur = $couleur;
    }

    function get_couleur() {
        return $this->couleur;
    }

    function set_visibilite($visibilite){
        $this->visibilite = $visibilite;
    }

    function get_visibilite() {
        return $this->visibilite;
    }
}

?>
