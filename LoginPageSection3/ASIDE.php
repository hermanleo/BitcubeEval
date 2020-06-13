##################################
###         Login.php          ###
##################################

<form method="POST">
    <label>Username: </label><input type="text" name="username" value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>" /><br/>
    <label>Password: </label><input type="password" name="password" value="<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass']; ?>" /><br/>
    <label>Remember Me </label><input <?php if (isset($_COOKIE['remember'])) echo "checked"; ?> type="checkbox" name="rememberme" value="ON"/><br/>
    <input type="submit" name="btnlogin" value="LOGIN"/>
</form>
<?php
if (isset($_POST['btnlogin']))
{
    if ($_POST['username'] == "user" && $_POST['password'] == "1234")
    {
        setcookie('user', $_POST['username']);
        if ($_POST['rememberme'] == "ON")
        {
            setcookie('pass', $_POST['password']);
            setcookie('remember', $_POST['rememberme']);
        }
        else
        {
            setcookie('remember', "NO");
        }
        header("location:Welcome.php");
    }
    else
    {
        echo "Incorrect Details!";
    }
}
?>




##################################
###        Welcome.php         ###
##################################       

<?php
if (isset($_COOKIE['user']))
{
    echo "Welcome " . $_COOKIE['user'];
    if ($_COOKIE['remember'] == "NO")
    {
        setcookie('user', "", time() - 1);
        setcookie('pass', "", time() - 1);
        setcookie('remember', "", time() - 1);
    }
}
?>