<?php

class Liste {
    private $id;
    private $titre;
    private $description;
    private $visibilite;
	private $userid;

    function __construct(int $id, string $titre, $description, int $visibilite,$userid){
        $this->id = $id;
        $this->titre = $titre;
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
