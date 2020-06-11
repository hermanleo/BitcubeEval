<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login screen</title>
    </head>
    <style>
        input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
        input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
    </style>
    <body>
        <form>
            <label>First name</label><input type="text" name="firstname" required/>
            <label>Last name</label><input type="text" name="lastname" required/>
            <label>Email</label><input type="text" name="email" required/>
            <label>Password</label><input type="text" name="password" required/>
        </form>
    </body>
    <body>
        <?php
        
            $firstname = filter_var($_GET['firstname']);
            $lastname = filter_var($_GET['lastname']);
            $Email = filter_var($_GET['username']);
            $password = filter_var($_GET['password']);
            
           if( !preg_match('/[A-Z]/', $string)){
                echo " There is at least  one Upper Case Characters inside the string ";
            }else{
                echo " There is no Upper case characters inside the string ";
            }
            if ( strlen($password) < 6 ) {
		echo "Password must contain atleast 5 characters";
            }
            if ( !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password) ) {
		echo "No special characters inside of the password";
            }
            if ( !preg_match("/[a-z]/", $password) ) {
		echo "There sould be atleast 1 lowercase character";
            }
            
            $firstname = trim($firstname);
            $lastname = trim($lastname);
            $username = trim($username);
            $password = trim($password);
            
           $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
            require_once './conn.php';
            $conn->SaveUserData($Email,$passwordHashed,$firstname, $lastname);
        ?>
    </body>
</html>
