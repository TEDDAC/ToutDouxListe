<?php
/* Test */
if (isset($_POST['saveandquit']) || isset($_POST['drop'])) {
    echo "Formulaire soumis";
    echo htmlspecialchars($_POST['saveandquit']). ' ' . htmlspecialchars($_POST['drop']);
    echo '<pre>'. var_dump($_POST) . '</pre>';
}
?>

<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Tâches</title>
</head>
<body>
    <div class="taskform">
        <form class="formtask" action="ajoutEditTache.php" method="POST">
                <input type="checkbox" name="checkbox" value="vrai">
                <input type="text" name="taskname" placeholder="Program a meeting with John">
            <p>
                <label for="categories">Categories : </label>
                <select name="categories">
                    <option value="house">House</option>
                    <option value="school">School</option>
                    <option value="job">Job</option>
                </select>
            </p>
            <p>
                <label for="date">Date : </label>
                <input type="date" name="date">
            </p>
            <p>
                <textarea name="notes" rows="8" cols="50"></textarea>
            </p>
            <p>
                <input type="submit" name="subbutton" value="Abandonner">
                <input type="submit" name="subbutton" value="Sauvegarder">
            </p>
        </form>
    </div>
</body>
