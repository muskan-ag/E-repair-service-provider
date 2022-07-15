<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){
if(isset($_REQUEST['aEmail'])){
$aEmail=mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
$aPassword=mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
$sql ="SELECT a_email,a_password FROM adminlogin_tb WHERE a_email='".$aEmail."' 
AND a_password= '".$aPassword."' limit 1";
$result = $conn->query($sql);
if($result->num_rows==1){
    $_SESSION['is_adminlogin']= TRUE;
    $_SESSION['aEmail']=$aEmail;
    echo "<script> location.href='dashboard.php';</script>";
    exit;
}
else{
    $msg = '<div class="alert alert-warning mt-2">Enter valid Email and Password</div>';
}
} 
} else {
    echo "<script> location.href='dashboard.php';</script>";
    

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS --->
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Login </title>
    </head>
    <body>
    <div class="container pt-5" > <h2 class="text-center">Online Service Management 
    </h2> <h3 class="text-center">Admin Area</h3>

<div class="row mt-4 mb-4">
<div class="col-md-6 offset-md-3">
<form action="" class="shadow-lg p-4" method="POST"> 

<div class="form-group">
<i class="fas fa-user"></i> <label for="email"
class="font-weight-bold pl-2">Email</label><input
type="email" class="form-control" placeholder="Email"
name="aEmail">

<small class="form-text">We'll never share your emsail
with anyone else.</small>
</div>
<div class="form-group">
<i class="fas fa-key"></i> <label for="pass"
class="font-weight-bold pl-2">Password</label><input type="password" class="form-control"
placeholder="Password" name="aPassword">
</div>
        <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm">Login</button>
    </form>
    <?php if(isset($msg)) {echo $msg;} ?>
    <div class="text-center"><a href= "../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to home</a></div>
    </div>
    </div>
    </div>

<!--javaScript Files-->

  <script src="../js/jquery.min.js">></script>
 <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script> 
 <script src="../js/all.min.js"></script>

    </body>
    </html>