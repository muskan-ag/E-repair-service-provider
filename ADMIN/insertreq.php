include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION[ 'is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php' </script>";
}
if(isset($_REQUEST['resubmit'])){
    if(($_REQUEST['r_password']=="")|| ($_REQUEST['r_name']=="")|| ($_REQUEST['r_email']=="")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $rpassword=$_REQUEST['r_password'];
        $rname=$_REQUEST['r_name'];
        $remail=$_REQUEST['r_email'];
        $sql = "INSERT INTO requesterlogin_tb (r_name,r_email,r_password) VALUES 
        ('$rname' , '$remail' , '$rpassword')";
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">
            Inserted Successfully</div>';
        }
        else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">
            Unable to add</div>';
        }


    }
}


?>
<!--Start 2nd column-->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
   <h3 class="text-center">Add New Requester </h3>
   <form action="" method="POST">
    <div class="form-group">
     <label for="r_name">Name</label>
       <input type="text" class="form-control" name="r_name" id="r_name">
    </div>

    <div class="form-group">
     <label for="r_email">Email</label>
       <input type="email" class="form-control" name="r_email" id="r_email">
    </div>

    <div class="form-group">
     <label for="r_password">Password</label>
       <input type="password" class="form-control" name="r_password" id="r_password">
    </div>

    <div class="text-center">
       <button type="submit" class="btn btn-danger mt-3" id="resubmit" name="resubmit">Submit</button>
      <a href="requester.php" class="btn btn-secondary mt-3">Close</a>

      </div>
<?php if(isset($msg)) {echo $msg; } ?>
</form>
</div>





<?php 
include('includes/footer.php');
?>