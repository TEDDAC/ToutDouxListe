<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css">
    <title>Tâches</title>
</head>
<body>
	<?php require("views/header.php"); ?>
    <div class="taskform">
        <form class="formtask" action="index.php?action=<?php
		 	if(isset($liste)){
				if(isset($_SESSION["userid"]) && $_SESSION["userid"] != NULL)
					echo "pvEditList";
				else echo "editPublicList";
				echo "&idListe=".$liste->get_id();
			} else {
				if(isset($_GET["action"]) and $_GET["action"] == "pvAddListForm" and isset($_SESSION["userid"]) && $_SESSION["userid"] != NULL)
					echo "addPrivateList";
				else
				 	echo "addPublicList";
			}
			 ?>" method="POST">
                <input type="text" name="titre" placeholder="Ma liste" <?php if(isset($liste)) echo('value="'.$liste->get_titre()).'"'; ?>>
            <p>
                <textarea name="description" rows="8" cols="50"><?= isset($liste) ? $liste->get_description() : "" ?></textarea>
            </p>
            <p>
                <input type="submit" name="subbutton" value="Sauvegarder">
				<a href="<?= isset($_GET["idListe"]) ? "index.php?action=".((isset($_SESSION["userid"]) && $_SESSION["userid"] != NULL) ? "pv":"")."showTaskOf&idListe=".$_GET["idListe"] : "index.php?action=showPublicList" ?>">Retour</a>
            </p>
        </form>
    </div>
</body>
