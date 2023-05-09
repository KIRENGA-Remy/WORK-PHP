<?php
if(isset($_POST['forgot'])){
    header('Location:../signUp/signUp.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Login Page</title>
    <script>
    function CreateNewAccount(){
        var account = confirm('Forgot your password? You can create a new account if you want to.');
        if(account){
            window.location.href = '../signUp/signUp.php';
            return false;
        } else {
            return false;
        }
    }
</script>

</head>
<body>
    <div class="box">
        <span class="border-line"></span>
        <form method="post">
            <h2>Sign In</h2>
        <div class="input-box">
            <input type="email" name="email" required="required" autocomplete="off">
            <span>E-mail</span><br>
            <i></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" required="required">
            <span>Password</span><br>
            <i></i>
        </div>
        <div class="links">
            <a href="" name="forgot" onclick="return CreateNewAccount()">Forgot Password</a>
            <a href="../signUp/signUp.php">Signup</a>
        </div>
        <div class="submit">
            <input type="submit" class="submit" value="Login" name="submit">
        </div>
    </form>
    </div>
</body>
</html>
<?php
include("../connection.php");

// Check if the form has been submitted
if(isset($_POST['submit'])){
    // Retrieve the user's input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before querying the database
    $hashedPassword = md5($password);

    // Query the database for a user with the given email and password
    $sql = "SELECT * FROM users WHERE Email='$email' AND password='$hashedPassword'";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // User exists
        $row = $result->fetch_assoc();
        //validate the user's credentials
        if($email == 'admin@gmail.com' &&
         $password == '12345'){

        //start a new session
        session_start();
        // Set session variables
         $_SESSION['firstName'] = $row['firstName'];
         $_SESSION['lastName'] = $row['lastName'];
         $_SESSION['email'] = $row['Email'];
         $_SESSION['password'] = $hashedPassword;
         $_SESSION['gender'] = $row['gender'];

            header('Location: ../display.php');
         } else {
            header('Location: ../homepage.php');
            exit();
         }
    } else {
        // User does not exist
        header("Location: ../signUp/signUp.php");
        exit();
    }
}
// Close the database connection
$conn->close();
?>```
