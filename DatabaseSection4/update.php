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
    </head>
    <body>
        <?php
        require_once './conn.php';
        
       $result =  $conn->DisplayEMployees($_GET['id']); // Rememberthat we have returned a result-set in the connection class
       
       $row = mysqli_fetch_array($result,1);
        
        ?>
        
         <form>
            <fieldset>
                <legend>Employee Details</legend>
                <ol>
                    <li><input type="hidden" name="id" value="<?php echo $row['user_id']; ?>"></li>
                    <li><label>User Name</label><input type="text" name="user_name" ></li>
                    <li><label>User Surname</label><input type="text" name="user_surname" ></li>
                    <li><label>User Email</label><input type="text" name="user_email" ></li>
                    <li><input type="submit" name="Save" value="SAVE"></li>
                </ol>
            </fieldset>

        </form>


        <?php
        if(isset($_GET['Save'])) {
            
            $user_name = filter_var($_GET['employee_name']);
            $user_surname = filter_var($_GET['employee_surname']);
            $user_email = filter_var($_GET['user_email']);
            
            $name = trim($user_name);
            $surname = trim($user_surname);
            $email = trim($user_email);
            $id = $_GET['id'];
            
            require_once './conn.php';
            $conn->UpdateEmployeeData($id,$name,$surname,$email);
            
            
            
            
            
        }
        ?>
    </body>
    
</html>
