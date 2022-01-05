<?php ?>

<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="views/style.css">
    <title>Login - Sing Up</title>
</head>
<body class="backform">
	<?php require("views/header.php"); ?>
    <div class="div_login">
        <h3>Create Account</h3>
        <form class="form_log" action="index.php?action=login" method="POST">
            <p>
                <input type="email" name="mail" placeholder="Your email" required autofocus>
            </p>
            <p>
                <input type="password" name="password" placeholder="Password" required>
            </p>
            <input type="submit" value="Se connecter" name="subbutton">
        </form>
        <p>
            Don't have an account ?
            <a href="index.php?action=signup">Sign up</a>
        </p>
    </div>
</body>
</html>
