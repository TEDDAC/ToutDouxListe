<?php  ?>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css">
    <title>Login - Sing Up</title>
</head>

<body>
	<?php require("header.php"); ?>
    <div class="div_signup">
        <h3>Want to register on ToutDouxListe?</h3>
        <?php //index.php?action=signup //$_SERVER['PHP_SELF'] Lui même ne marche pas?>
        <form class="form_log" action="index.php?action=formcreate" method="POST">
            <p>
                <input type="text" name="username" placeholder="Your name" required autofocus>
            </p>
            <p>
                <input type="email" name="mail" placeholder="Your email" required>
            </p>
            <p>
                <input type="password" name="password" placeholder="Password" required>
            </p>
            <p>
                <input type="password" name="secondpassword" placeholder="Same Password" required>
            </p>
            <input type="submit" value="Créer le compte" name="subbutton">
        </form>
        <p>
            Already have an account?
            <a href="index.php?action=login">Log in</a>
        </p>
    </div>
</body>

</html>
