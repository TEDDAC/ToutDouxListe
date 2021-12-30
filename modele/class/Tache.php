<?php

class Tache {
    private $id;
    private $titre;
    private $description;
	private $fait;
    private $dateFin;
    private $listeId;

    function __construct($id,$titre,$description,$fait,$dateFin,$listeId){
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
		$this->fait = $fait;
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

    function set_dateFin($dateFin){
        $this->dateFin = $dateFin;
    }

    function get_dateFin() {
        return $this->dateFin;
    }

	function isDone(){
		return $this->fait;
	}

	function set_fait($fait){
		$this->fait = $fait;
	}

	function get_listeId(){
		return $this->listeId;
	}

	function set_listeId($listeId){
		$this->listeId = $listeId;
	}
}

?>
