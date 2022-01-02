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
	<a href="index.php?action=insertTaskForm&idListe=<?= $_GET["idListe"] ?>">Ajouter une tache</a><br><br>

	<button type="button" name="confirmListDelete" onclick="confirmListDelete()">Supprimer la liste</button><br>
	<script type="text/javascript">
		function confirmListDelete(){
			if(confirm("Êtes vous sûr de vouloir supprimer cette liste ? Cette action est irréversible et supprimera toutes les tâches de la liste.")){
				window.location.replace("index.php?action=deletePublicList&idListe=<?= $liste->get_id() ?>");
			}
		}
	</script>
	<a href="index.php?action=editPublicListForm&idListe=<?= $liste->get_id() ?>">Modifier la liste</a><br><br>

	<a href="index.php?action=showPublicList">Accueil</a>
</body>
</html>
