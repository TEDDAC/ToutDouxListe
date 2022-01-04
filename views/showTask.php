<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css">
    <title>Ma page</title>
</head>
<body>
	<?php require("views/header.php"); ?>
	<div class="showTask">
		<h2 class="taskTitle"><?= $liste->get_titre() ?></h2>
		<p><?= $liste->get_description() ?></p>
		<table>
	    <?php
	    foreach($taches as $tache){
			echo "<tr>";
			if($tache->isDone())
				echo "<td>✓</td><td><span class=\"done\">";
			else echo "<td>○</td><td><span>";
	        echo($tache->get_titre().": ".$tache->get_description());
			if($tache->get_dateFin() != NULL)
				echo " - ".$tache->get_dateFin(); ?>
			</span>
			<a href="index.php?action=editTask&id=<?= $tache->get_id() ?>">🖉</a>
			<a href="index.php?action=removeTask&id=<?= $tache->get_id() ?>">☓</a>
		</td></tr>
	    <?php }
	    ?>
		</table>
		<a href="index.php?action=insertTaskForm&idListe=<?= $_GET["idListe"] ?>">Ajouter une tache</a><br><br>

		<button type="button" name="confirmListDelete" onclick="confirmListDelete()">Supprimer la liste</button><br>
		<script type="text/javascript">
			function confirmListDelete(){
				if(confirm("Êtes vous sûr de vouloir supprimer cette liste ? Cette action est irréversible et supprimera toutes les tâches de la liste.")){
					window.location.replace("index.php?action=deletePublicList&idListe=<?= $liste->get_id() ?>");
				}
			}
		</script>
		<a href="index.php?action=<?= (isset($_SESSION["userid"]) && $_SESSION["userid"] != NULL) ? "pvEditListForm":"editPublicListForm" ?>&idListe=<?= $liste->get_id() ?>">Modifier la liste</a><br><br>
	</div>
</body>
</html>
