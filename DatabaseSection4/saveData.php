<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            ol {
                list-style: none;
                
            }
            label{
                display: inline-block;
                width: 200px;
                text-align: right;
                padding:0px 10px; 
            }
            form li{
                margin: 4px 0px;
            }
        </style>
    </head>
    <body>
        <form>
            <fieldset>
                <legend>User Details</legend>
                <ol>
                    <li><label>User Name</label><input type="text" name="user_name" ></li>
                    <li><label>User Surname</label><input type="text" name="user_surname" ></li>
                    <li><label>User Email</label><input type="text" name="user_email" ></li>
                    <li><label>User Password</label><input type="text" name="user_password" ></li>
                    <li><input type="submit" name="Save" value="SAVE"></li>
                </ol>
            </fieldset>

        </form>


        <?php
        if(isset($_GET['Save'])) {
            
            $user_name = filter_var($_GET['user_name']);
            $user_surname = filter_var($_GET['user_surname']);
            $user_email = filter_var($_GET['user_email']);
            $user_password = filter_var($_GET['user_password']);
            
            $user_firstname = trim($employee_name);
            $user_lastname = trim($employee_surname);
            $user_e_mail = trim($user_email);
            $password = trim($user_password);
           
            require_once './conn.php';
            $conn->SaveUserData($user_firstname,$user_lastname,$user_e_mail,$password);
            
            
            
            
            
        }
        ?>
    </body>
</html>
