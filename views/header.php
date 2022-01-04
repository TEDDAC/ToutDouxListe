<header>
	<h2>TouTDouxListe</h2>
	<nav>
		<div class="navlink"><h4><a href="index.php">Accueil</a></h4></div>
		<?php
		if(isset($_SESSION["login"]) and $_SESSION["login"]){ ?>
			<div class="navlink"><h4><a href="index.php?action=showPrivateList&idUser=<?= $_SESSION["login"] ?>">Mes listes</a></h4></div>
			<div class="navlink"><h4><a href="index.php?action=login">Se connecter</a></h4></div>
		<?php
		} else {
			?> <div class="navlink"><h4><a href="index.php?action=logout">Se deconnecter</a></h4></div> <?php
		}
		?>
	</nav>
</header>
