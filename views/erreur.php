<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Aie !</title>
</head>
<body>
    <div class="error">
        <h3>Aie !</h3>
        <p>
            Il semblerai que :
            <?php foreach ($Erreurs as $erreur) {
                    echo '<pre>' . $erreur .'<\pre>';
                }
            ?>
        </p>
        <a href="<?= $_SERVER['HTTP_REFERER'] ?>">Retour</a>
    </div>
</body>
</html>
