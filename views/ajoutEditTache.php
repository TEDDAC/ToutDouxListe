<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Tâches</title>
</head>
<body>
    <div class="taskform">
        <form class="formtask" action="index.php?action=addTask&idListe=<?= $_GET["idListe"] ?>" method="POST">
                <input type="checkbox" name="checkbox" value="vrai">
                <input type="text" name="titre" placeholder="Program a meeting with John">
            <p>
                <label for="date">Date : </label>
                <input type="datetime-local" name="dateFin">
            </p>
            <p>
                <textarea name="description" rows="8" cols="50"></textarea>
            </p>
            <p>
                <input type="submit" name="subbutton" value="Sauvegarder">
				<a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php?action=showPublicList" ?>">Retour</a>
            </p>
        </form>
    </div>
</body>
