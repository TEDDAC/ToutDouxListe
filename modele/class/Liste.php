<?php

class Liste {
    private $id;
    private $titre;
    private $description;
	private $couleur;
    private $visibilite;
	private $userid;

    function __construct(int $id, string $titre, $description,string $couleur, int $visibilite,$userid){
        $this->id = $id;
        $this->titre = $titre;
        $this->couleur = $couleur;
		$this->description = $description;
        $this->visibilite = $visibilite;
		$this->userid = $userid;
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

	function get_couleur(){
		return $this->couleur;
	}

	function set_couleur(string $couleur){
		$this->couleur = $couleur;
	}

    function get_description() {
        return $this->description;
    }

    function set_visibilite($visibilite){
        $this->visibilite = $visibilite;
    }

    function get_visibilite() {
        return $this->visibilite;
    }

	function get_userid(){
		return $this->userid;
	}

	function set_userid($userid){
		$this->userid = $userid;
	}
}

?>
