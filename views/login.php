<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login - Sing Up</title>
    </head>
    <body>
        <div class="">
            <h3>Log in to ToutDouxListe</h3>
            <form method="post" action="index.php?action=login">
                <p>
                    <input type="email" name="mail" placeholder="Your email" required>
                </p>
                <p>
                    <input type="password" name="password" placeholder="Password" required>
                </p>
                <button type="button" name="button">Log in</button>
            </form>
            <p>
                Don't have an account?
                <a href="signup.php">Sign up</a>
            </p>
        </div>
    </body>
</html>
