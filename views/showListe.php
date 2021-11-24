<?php
require_once("class/Tache.php");

foreach($liste as $tache){
    echo $tache->get_titre()."    ".$tache->get_descripbtion()."    ".$tache->get_datefin."<br>";
}
?>
