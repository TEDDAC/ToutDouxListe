<?php

if (isset($_POST['subbutton'])) {
    echo "Formulaire soumis";
}
?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login - Sing Up</title>
</head>
<body>
    <div class="div_signup">
        <h3>Log in to ToutDouxListe</h3>
        <form class="form_log" action="login.php" method="POST">
            <p>
                <input type="email" name="mail" placeholder="Your email" required autofocus>
            </p>
            <p>
                <input type="password" name="password" placeholder="Password" required>
            </p>
            <input type="submit" value="Se connecter" name="subbutton">
        </form>
        <p>
            Don't have an account?
            <a href="signup.php">Sign up</a>
        </p>
    </div>
</body>
</html>
