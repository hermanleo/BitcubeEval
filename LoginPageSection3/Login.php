<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            <label>Username: </label><input type="text" name="username" required value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>"/><br/>
            <label>Password: </label><input type="password" name="password" required value="<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass']; ?>"/><br/>
            <label>Remember Me </label><input <?php if (isset($_COOKIE['remember'])) echo "checked"; ?> type="checkbox" name="rememberme" value="ON"/><br/>
            <input type="submit" name="btnLogin" value="LOGIN"/><br/>
        </form>
        <?php
        if (isset($_POST['btnLogin']))
        {
            if ($_POST['username'] == "user1" && $_POST['password'] == "user1")
            {
                setcookie("user", $_POST['username'], time() + 10 * 60);
                if ($_POST['rememberme'] == "ON")
                {
                    setcookie("pass", $_POST['password'], time() + 10 * 60);
                    setcookie("remember", $_POST['rememberme'], time() + 10 * 60);
                }
                else
                {
                    setcookie("remember", "NO", time() + 10 * 60);
                }
                header("location:Welcome.php");
            }
        }
        ?>
    </body>
</html>
