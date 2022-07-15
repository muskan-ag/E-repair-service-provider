<?php

define('TITLE', 'Product Report');
define('PAGE', 'sellreport');
include('includes/header.php');
include('../dbConnection.php');
?>
<!--Start 2nd Column -->

<div class="col-sm-9 col-md-10 mt-5 text-center"> <form action="" method="POST" class="d-print-none">
<div class="form-row">
<div class="form-group col-md-2">
<input type="date" class="form-control" id="startdate" name="startdate"> </div> <span> to </span>
<div class="form-group col-md-2">
<input type="date" class="form-control" id="enddate" name="enddate">
</div>
<div class="form-group">
<input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
</div>
<?php include('includes/footer.php') ?>