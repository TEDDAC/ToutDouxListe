<html>
<head>
    <title>Ma page</title>
</head>
<body>
    <?php
    foreach($listes as $liste){
	?>
        <a href="index.php?action=showTaskOf&idListe=<?= $liste->get_id() ?>"><?= $liste->get_titre() ?></a><br>
	<?php
    }
    ?>

	<br>
	<a href="index.php?action=addPublicListForm">Créer une liste publique</a>
</body>
</html>
