<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css">
    <title>Home</title>
</head>
<body>
	<?php require("views/header.php"); ?>

	<div class="showList">
	    <?php
	    foreach($listes as $liste){
		?>
	        <a href="index.php?action=showTaskOf&idListe=<?= $liste->get_id() ?>"><?= $liste->get_titre() ?></a><br>
		<?php
	    }
	    ?>

		<br>
		<a href="index.php?action=addPublicListForm">Créer une liste publique</a>
	</div>
</body>
</html>
