<?php
require_once("class/Tache.php");

foreach($liste as $tache){
    echo($tache->get_titre()."    ".$tache->get_description()."    ".$tache->get_datefin()."<br>");
}
?>
