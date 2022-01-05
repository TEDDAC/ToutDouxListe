<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css">
    <title>Tâches</title>
</head>
<body class="backform">
	<?php require("views/header.php"); ?>
    <div class="taskform">
        <form class="formtask" action="index.php?action=<?= (isset($_SESSION["userid"]) && $_SESSION["userid"] != NULL) ? "pv":"" ?><?= isset($tache) ? "updateTask" : "addTask" ?>&<?= isset($tache) ? "id=".$tache->get_id() : "idListe=".$_GET["idListe"] ?>" method="POST">
                <input type="checkbox" name="fait" value="vrai" <?php if(isset($tache)){ if($tache->isDone()) echo "checked"; } ?>>
                <input type="text" name="titre" placeholder="Acheter du pain" <?php if(isset($tache)) echo("value=\"".$tache->get_titre()."\""); ?>>
            <p>
                <label for="date">Date : </label>
                <input type="datetime-local" name="dateFin" <?php if(isset($tache)) echo('value="'.$tache->get_dateFin().'"'); ?>>
            </p>
            <p>
                <textarea name="description" rows="8" cols="50"><?= isset($tache) ? $tache->get_description() : "" ?></textarea>
            </p>
            <p>
                <input type="submit" name="subbutton" value="Sauvegarder">
				<a href="<?= isset($_GET["idListe"]) ? "index.php?action=".((isset($_SESSION["userid"]) and $_SESSION["userid"] != NULL) ? "pv": "")."showTaskOf&idListe=".$_GET["idListe"] : "index.php?action=showPublicList" ?>">Retour</a>
            </p>
        </form>
    </div>
</body>
