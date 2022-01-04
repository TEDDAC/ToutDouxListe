<header>
	<h2>ToutDouxListe</h2>
	<nav>
		<div><h4><a href="index.php?action=showPublicList">Accueil</a></h4></div>
		<?php
		if(isset($_SESSION["userid"]) and $_SESSION["userid"]){ ?>
			<div><h4><a href="index.php?action=showPrivateList&userid=<?= $_SESSION["userid"] ?>">Mes listes</a></h4></div>
			<div><h4><a href="index.php?action=logout">Se deconnecter</a></h4></div>
		<?php
		} else {
			?> <div><h4><a href="index.php?action=login">Se connecter</a></h4></div> <?php
		}
		?>
	</nav>
</header>
