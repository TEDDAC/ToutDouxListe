<?php

class Tache {
    private $id;
    private $titre;
    private $description;
    private $datefin;
    private $listeId;

    function __construct(int $id, string $titre, string $description, DateTime $dateFin,int $listeId){
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->dateFin = $dateFin;
        $this->listeId = $listeId;
    }

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

    function set_description($description){
        $this->description = $description;
    }

    function get_description() {
        return $this->description;
    }

    function set_datefin($datefin){
        $this->datefin = $datefin;
    }

    function get_datefin() {
        return $this->datefin;
    }
}

?>
