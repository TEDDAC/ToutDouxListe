<?php

  class Liste {
    private $id;
    private $titre;
    private $description;
    private $datefin;

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
