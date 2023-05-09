<?php
$serverName = "localhost";
$username = "root";
$password="";
$database = "crud-operation";
$conn= new mysqli ($serverName, $username,$password,$database);
if(!$conn)
    die(mysqli_error($conn));
?>