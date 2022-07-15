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
if(isset($_REQUEST['empupdate'])){
    if(($_REQUEST['empName']=="")|| ($_REQUEST['empCity']=="")|| ($_REQUEST['empMobile']=="")
    ||($_REQUEST['empEmail']=="")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $eid=$_REQUEST['empid'];
        $eName=$_REQUEST['empName'];
        $eCity=$_REQUEST['empCity'];
        $eMobile=$_REQUEST['empMobile'];
        $eEmail=$_REQUEST['empEmail'];
        $sql = "UPDATE technician_tb SET empName='$eName',
        empCity='$eCity', empMobile='$eMobile',empEmail='$eEmail' WHERE empid='$eid'";
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">
            Updated Successfully</div>';
        }
        else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">
            Unable to update</div>';
        }


    }
}




?>

<!--Start 2nd Column-->
<div class= "col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Technician Details</h3>
<?php 
if(isset($_REQUEST['edit'])){
    $sql="SELECT * FROM technician_tb WHERE empid= {$_REQUEST['id']}";
    $result= $conn->query($sql);
    $row=$result->fetch_assoc();
    }
    
?>

<form action="" method="POST">
<div class="form-group">
<label for="empid">Employee ID</label>
<input type="text" class="form-control" name="empid" id="empid" 
value="<?php if(isset($row['empid'])) {echo $row['empid'];}?>" readonly>
</div>

<div class="form-group">
<label for="empName">Name</label>
<input type="text" class="form-control" name="empName" id="empName" 
value="<?php if(isset($row['empName'])) {echo $row['empName'];}?>" >
</div>

<div class="form-group">
<label for="empCity">City</label>
<input type="text" class="form-control" name="empCity" id="empCity" 
value="<?php if(isset($row['empCity'])) {echo $row['empCity'];}?>">
</div>

<div class="form-group">
<label for="empMobile">Mobile</label>
<input type="text" class="form-control" name="empMobile" id="empMobile" onkeypress="isInputNumber(event)"
value="<?php if(isset($row['empMobile'])) {echo $row['empMobile'];}?>" >
</div>

<div class="form-group">
<label for="empEmail">Email</label>
<input type="email" class="form-control" name="empEmail" id="empEmail" 
value="<?php if(isset($row['empEmail'])) {echo $row['empEmail'];}?>" >
</div>
<div class="text-center">
<button type="submit" class="btn btn-danger mt-3" id="empupdate" name="empupdate">Update</button>
<a href="technician.php" class="btn btn-secondary mt-3">Close</a>

</div>
<?php if(isset($msg)) {echo $msg; } ?>
</form>
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