<html>
<head>
    <title>Ma page</title>
</head>
<body>
    <?php
    foreach($listes as $liste){
	?>
        <a href="index.php?action=showTaskOf&id=<?= $liste->get_id() ?>"><?= $liste->get_titre() ?></a><br>
	<?php
    }
    ?>
</body>
</html>
