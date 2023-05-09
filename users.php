<!DOCTYPE html>
<html>
  <head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Crud-Operation</title>
  </head>
  <body>
    <div class="container my-5">
  <form method="post">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="fname" placeholder="Enter First Name" autocomplete="off">
    </div>
    <div class="form-group">
  <label>Last Name</label>
    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" autocomplete="off">
    </div>
    <div class="form-group">
  <label>E-mail</label>
    <input type="email" class="form-control" name="email" placeholder="Enter Your E-mail" autocomplete="off">
    </div>
    <div class="form-group">
  <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter Your Password" autocomplete="off">
    </div>
    <div class="form-group">
    <label><h4>Gender</h4></label><br>
  Male:<input type="radio" name="gender" class="btn pointer" value="Male">
  Female:<input type="radio" name="gender" class="btn pointer" value="Female">
</div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  </body>
</html>

<?php
include("connection.php");
// re-index the book IDs
mysqli_query($conn, "SET @count = 0;");
mysqli_query($conn, "UPDATE users SET id = @count:= @count + 1;");
mysqli_query($conn, "ALTER TABLE users AUTO_INCREMENT = 1;");
if (isset($_POST["submit"])) {
    $firstName = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lname"]);
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    // get the current highest users ID
    $result = mysqli_query($conn, "SELECT MAX(id) FROM users");
    $row = mysqli_fetch_array($result);
    $new_id = $row[0] + 1; // increment the current highest ID to get the new contact ID
    $sql = "INSERT INTO users(id, firstName, lastName, Email, password, gender) VALUES ('$new_id', '$firstName','$lastName', '$Email','$password', '$gender')";
    if(mysqli_query($conn, $sql)) {
        header("Location:display.php");
  } else {
    die(mysqli_error($conn));
  }
};
?>