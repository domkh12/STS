<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "sts";
    $conn = mysqli_connect($hostname,$username,$password,$database);
    if(!$conn){
        die("Connction failed: " . mysqli_connect_error());
    }
    
?>
