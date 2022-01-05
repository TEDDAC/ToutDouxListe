<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css">
    <title>Aie !</title>
</head>
<body class="backform">
	<?php require("views/header.php"); ?>
    <div class="error">
        <h3>Aie !  :'(</h3>
        <p>
            Il semblerai que : <?= $e->getMessage() ?>
        </p>
        <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php?action=showPublicList" ?>">Retour</a>
    </div>
</body>
</html>
