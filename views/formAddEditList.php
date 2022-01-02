<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Tâches</title>
</head>
<body>
    <div class="taskform">
        <form class="formtask" action="index.php?action=<?= isset($liste) ? "editPublicList&idListe=".$liste->get_id() : "addPublicList" ?>" method="POST">
                <input type="text" name="titre" placeholder="Ma liste" <?php if(isset($liste)) echo('value="'.$liste->get_titre()).'"'; ?>>
            <p>
                <textarea name="description" rows="8" cols="50"><?= isset($liste) ? $liste->get_description() : "" ?></textarea>
            </p>
            <p>
                <input type="submit" name="subbutton" value="Sauvegarder">
				<a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php?action=showPublicList" ?>">Retour</a>
            </p>
        </form>
    </div>
</body>
