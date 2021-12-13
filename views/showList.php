<html>
<head>
    <title>Ma page</title>
</head>
<body>
    <?php
    require_once("modele/class/Tache.php");

    foreach($liste as $list){
        echo($list->get_titre().": ".$list->get_description()."<br>");
    }
    ?>
</body>
</html>
