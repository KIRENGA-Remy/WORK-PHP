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
  Male:<input type="radio" name="gender" class="btn pointer" value="Female">
  Female:<input type="radio" name="gender" class="btn pointer" value="Male">
</div>
  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
</div>
  </body>
</html>

<?php
include("connection.php");

$id=$_GET['updateid'];

if(isset($_POST["update"])){
  $FirstName=$_POST["fname"];
  $LastName=$_POST["lname"];
  $Email=$_POST["email"];
  $Password=$_POST["password"];
  $Gender=$_POST["gender"];

  $sql="UPDATE `users` SET id=$id, firstName='$FirstName', lastName='$LastName', Email='$Email', password='$Password', gender='$Gender' where id=$id";

  $result=mysqli_query($conn,$sql);
  if($result){
    header("Location:display.php");
  } else {
    die(mysqli_error($conn));
  }
};
?>