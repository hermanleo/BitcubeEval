<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conn
 *
 * @author user
 */
class conn {

    private $host, $user, $password, $database, $link;

    function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    function ConnectToDB() {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (!$this->link) {
            die("Error : " . mysqli_error($this->link));
        }
    }

    function SaveUserData($user_name, $user_surname, $user_email, $user_password) {
        $query = "INSERT INTO `user_details` (`user_id`, `user_name`, `user_surname`, `user_email`, `user_password`) VALUES (NULL, ' $user_name', '$user_surname', '$user_email', '$user_password')";

        if (mysqli_query($this->link, $query)) {
            echo "Details for $user_name $user_surname saved";
        } else {
            die("Error" . mysqli_error($this->link));
        }
    }

    function DisplayEMployees($id=NULL) {
        
        if($id != NULL) // If an ID has been provided, this statement evaluates to TRUE because SOME_ID is not the same as NULL
        {
            $query = "SELECT * FROM `user_details` WHERE `user_details`.`user_id` =$id;";
             return mysqli_query($this->link, $query);
        }

        $query = "SELECT * FROM `user_details`";
        $result = mysqli_query($this->link, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $id = $row['user_id'];
            $name = $row['user_name'];
            $surname = $row['user_surname'];
            $email = $row['user_email'];
            
            echo "<li>$name $surname $email| <a class='leftAnchor' href='delete.php?id=$id'>DELETE EMPLOYEE </a>  <a href='update.php?id=$id'>UPDATE EMPLOYEE </a></li>";
        }
    }
    
    function DeleteEmployee($id) {
        $query = "DELETE FROM `employee_details` WHERE `employee_details`.`employee_id` = $id";
        mysqli_query($this->link, $query);
   //The following inbuilt function will modify the raw headers so that the app redirects to the given location
   header("location:display.php");
   
        
    }
    
    function UpdateEmployeeData($id,$name,$surname,$email)
    {
        $query = "UPDATE `user_details` SET `user_name` = '$name', `user_surname` = '$surname', `user_email` = '$email' WHERE `user_details`.`user_id` = $id ";
        mysqli_query($this->link, $query);
        header("location:display.php");
        
    }

    function UpdateUserPassword($id,$password)
    {
        $query = "UPDATE `user_details` SET `user_password` = '$password' WHERE `user_details`.`user_id` = $id ";
        mysqli_query($this->link, $query);
        header("location:display.php");
        
    }
}

$conn = new conn("localhost", "root", "", "user_db");

$conn->ConnectToDB();




