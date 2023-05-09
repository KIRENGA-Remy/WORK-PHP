<?php
session_start(); //To ensure you are using same session
session_destroy(); //Destroy the session
header("location:login.php"); //To redirect back to "index.php"
exit();
?>