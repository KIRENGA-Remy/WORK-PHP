<?php
$serverName = "localhost";
$username = "root";
$password="";
$database = "crud-operation";
$conn= new mysqli ($serverName, $username,$password,$database);
if(!$conn)
    die(mysqli_error($conn));
?>


<!DOCTYPE html>
<html>
<head>
    <title>My Homepage</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <div class="container">
    <header>
        <h1>Welcome To Homepage</h1>
    </header>
    <nav id="nav1">
        <ul>
            <li><a href="#"></a>Home</li>
            <li><a href="#"></a>About</li>
            <li><a href="#"></a>Contact</li>
        </ul>
    </nav>
    <main>
        <p>Welcome to homepage.
        This is where we share thoughts and ideas with the world</p>
        <a href="./Login/login.php">Logout</a>
    </main>
    <nav id="nav2">
        <ul>
            <li><a href="#"></a>Sign Up</li>
            <li><a href="#"></a>Log In</li>
            <li><a href="#"></a>Feedback</li>
        </ul>
    </nav>
    <footer>
        <p>&copy; GITOLI Remy Claudien 2023 Homepage</p>
    </footer>
    </div>
</body>
</html>