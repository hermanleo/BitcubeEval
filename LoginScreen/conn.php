<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conn
 *
 * @author herma
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

    function SaveUserData($email, $password, $firstname, $lastname) {
        $query = "INSERT INTO `login` (`UserId`, `Email`, `Password`, `FirstName`, `LastName`) VALUES (NULL, ' `$user_name`, `$password`, `$firstname`, `$lastname`)";

        if (mysqli_query($this->link, $query)) {
            echo "Details for $firstname $lastname saved";
        } else {
            die("Error" . mysqli_error($this->link));
        }
    }

    
    
   

}

$conn = new conn("localhost:3036", "root", "", "logindb");

$conn->ConnectToDB();
