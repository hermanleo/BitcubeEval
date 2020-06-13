<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "Welcome " . $_COOKIE['user'] . $_COOKIE['pass'];
        if ($_COOKIE['remember']=="NO")
        {
            setcookie("user", "", time() - 1);
            setcookie("pass", "", time() - 1);
            setcookie("remember", "", time() - 1);
        }
        ?>
    </body>
</html>
