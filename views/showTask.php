<html>
<head>
    <title>Ma page</title>
</head>
<body>
    <?php
    foreach($taches as $tache){
        echo($tache->get_titre().": ".$tache->get_description());
		if($tache->get_dateFin() != NULL)
			echo " - ".$tache->get_dateFin(); ?>
		<a href="index.php?action=editTask&id=<?= $tache->get_id() ?>">modifier</a>
		<a href="index.php?action=removeTask&id=<?= $tache->get_id() ?>">supprimer</a>
		<br>
    <?php }
    ?>
	<a href="index.php?action=insertTaskForm&idListe=<?= $_GET["id"] ?>">Ajouter une tache</a><br>
	<a href="index.php?action=showPublicList">Accueil</a>
</body>
</html>
