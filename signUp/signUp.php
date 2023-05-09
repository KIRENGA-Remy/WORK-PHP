
<!DOCTYPE html>
<html>
<head>
       <link rel="stylesheet" href="signUp.css">
    <title>Sign In Page.</title>
        <script>
        function confirmCreateNewUser() {
            var result = confirm("Confirm To Create An Account With Us");
            if (result) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <h1 class="h1">How to create an  account with us.</h1>
        <h2 class="h22">SIGN UP</h2>
        <form method="post">
            <div>
                <i class="fa fa-address-book"></i>
                <input type="text" placeholder="Enter First Name" class="Input" name="firstName" autocomplete="off">
                <input type="text" placeholder="Enter Last Name" class="Input" name="lastName" autocomplete="off">
                <input type="email" placeholder="Enter Your Email" class="Input" name="Email" autocomplete="off">
            </div>

            <div class="user">
                <i class="fa fa-user"></i>
                <input type="password" placeholder="Enter Your Password" class="Input" name="password" autocomplete="off">
                <label><h4>Gender</h4></label><br>
                Male:<input type="radio" name="gender" class="btn pointer" value="Male" autocomplete="off">
                Female:<input type="radio" name="gender" class="btn pointer" value="Female" autocomplete="off">
            </div>
           
            <button class="signin-btn" name="create" onclick="return confirmCreateNewUser()">Sign In</button>
        </form>
        <p class="or">
            <span class="Copyright"><br><br>Copyright &copy; -by GITOLI Remy Claudien </span>
        </p>
    </div>
</body>
</html>
<?php
$serverName = "localhost";
$username = "root";
$password="";
$database = "crud-operation";
$conn= new mysqli ($serverName, $username,$password,$database);
if(!$conn) die(mysqli_error($conn));

if(isset($_POST['create'])){
    $id=$_POST['id'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $Email=$_POST['Email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];

    $sql = "INSERT INTO users(id, firstName, lastName, Email, password, gender) VALUES ('$id', '$firstName','$lastName', '$Email','$password', '$gender')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('Location:../Login/login.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>