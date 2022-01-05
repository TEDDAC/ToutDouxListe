<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css"/>
    <title><?= (isset($_GET["action"]) and $_GET["action"] == "showPrivateList&") ? "Liste privée" : "Home" ?></title>
</head>
<body class="backform">
	<?php require("views/header.php"); ?>

	<div class="showList">
		<h3><?= (isset($_GET["action"]) and $_GET["action"] == "showPrivateList") ? "Listes privées"  : "Listes Publiques"?></h3>
	    <?php
	    foreach($listes as $liste){
		?>
	        <a href="index.php?action=<?=(isset($_SESSION["userid"]) && $_SESSION["userid"] != NULL) ? "pv" : ""?>showTaskOf&idListe=<?= $liste->get_id() ?>"><?= $liste->get_titre() ?></a><br>
		<?php
	    }
	    ?>

		<br>
		<a href="index.php?action=<?= (isset($_GET["action"]) and $_GET["action"] == "showPrivateList" and isset($_SESSION["userid"]) && $_SESSION["userid"] != NULL) ? "pvAddListForm":"addPublicListForm" ?>">Créer une liste</a>
	</div>
</body>
</html>
