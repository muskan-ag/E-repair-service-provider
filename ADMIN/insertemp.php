<?php
define('TITLE','Update Technician');
define('PAGE','technician');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION[ 'is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php' </script>";
}
if(isset($_REQUEST['empsubmit'])){
    if(($_REQUEST['empName']=="")|| ($_REQUEST['empCity']=="")|| 
    ($_REQUEST['empMobile']=="")|| ($_REQUEST['empEmail']=="")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $eName=$_REQUEST['empName'];
        $eCity=$_REQUEST['empCity'];
        $eMobile=$_REQUEST['empMobile'];
        $eEmail=$_REQUEST['empEmail'];
        $sql = "INSERT INTO technician_tb (empName,empCity,empMobile,empEmail) VALUES 
        ('$eName' ,'$eCity', '$eMobile' , '$eEmail')";
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
   <h3 class="text-center">Add New Technician </h3>
   <form action="" method="POST">
    <div class="form-group">
     <label for="empName">Name</label>
       <input type="text" class="form-control" name="empName" id="empName">
    </div>

    <div class="form-group">
     <label for="empCity">City</label>
       <input type="text" class="form-control" name="empCity" id="empCity">
    </div>

    <div class="form-group">
     <label for="empMobile">Mobile</label>
       <input type="text" class="form-control" name="empMobile" id="empMobile"
        onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group">
     <label for="empEmail">Email</label>
       <input type="email" class="form-control" name="empEmail" id="empEmail">
    </div>

    <div class="text-center">
       <button type="submit" class="btn btn-danger mt-3" id="empsubmit" name="empsubmit">Submit</button>
      <a href="requester.php" class="btn btn-secondary mt-3">Close</a>

      </div>
<?php if(isset($msg)) {echo $msg; } ?>
</form>
</div>

<!--Only numbers for input fields-->
<script>
function isInputNumber(event){
    var ch= String.fromCharCode(event.which);
    if(!(/[0-9]/.test(ch))){
        event.preventDefault();
    }
}
</script>



<?php 
include('includes/footer.php');
?>