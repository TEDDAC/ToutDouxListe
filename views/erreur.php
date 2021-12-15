<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Aie !</title>
</head>
<body>
    <div class="error">
        <h3>Aie !  :'(</h3>
        <p>
            Il semblerai que : <?= $e->getMessage() ?>
        </p>
		<?php if(isset($_SERVER['HTTP_REFERER'])){ ?>
        <a href="<?= $_SERVER['HTTP_REFERER'] ?>">Retour</a>
		<?php } ?>
    </div>
</body>
</html>
