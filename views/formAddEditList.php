<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css">
    <title>Tâches</title>
</head>
<body>
	<?php require("views/header.php"); ?>
    <div class="taskform">
        <form class="formtask" action="index.php?action=<?= isset($liste) ? "editPublicList&idListe=".$liste->get_id() : "addPublicList" ?>" method="POST">
                <input type="text" name="titre" placeholder="Ma liste" <?php if(isset($liste)) echo('value="'.$liste->get_titre()).'"'; ?>>
            <p>
                <textarea name="description" rows="8" cols="50"><?= isset($liste) ? $liste->get_description() : "" ?></textarea>
            </p>
            <p>
                <input type="submit" name="subbutton" value="Sauvegarder">
				<a href="<?= isset($_GET["idListe"]) ? "index.php?action=showTaskOf&idListe=".$_GET["idListe"] : "index.php?action=showPublicList" ?>">Retour</a>
            </p>
        </form>
    </div>
</body>
