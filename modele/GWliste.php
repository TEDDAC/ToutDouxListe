<?php
require_once("config/Connection.php");
require_once("class/Liste.php");
require_once("class/Tache");
class GWliste {
    Connection $con;

    function __construct(Connection $con){
        $this->con = $con;
    }}
}
?>
