<html>
<head>
    <title>Ma page</title>
</head>
<body>
	<h2><?= $liste->get_titre() ?></h2>
	<p><?= $liste->get_description() ?></p>
    <?php
    foreach($taches as $tache){
		if($tache->isDone())
			echo "✓";
		else echo "○";
        echo($tache->get_titre().": ".$tache->get_description());
		if($tache->get_dateFin() != NULL)
			echo " - ".$tache->get_dateFin(); ?>
		<a href="index.php?action=editTask&id=<?= $tache->get_id() ?>">🖉</a>
		<a href="index.php?action=removeTask&id=<?= $tache->get_id() ?>">☓</a>
		<br>
    <?php }
    ?>
	<a href="index.php?action=insertTaskForm&idListe=<?= $_GET["idListe"] ?>">Ajouter une tache</a><br>
	<a href="index.php?action=showPublicList">Accueil</a>
</body>
</html>
