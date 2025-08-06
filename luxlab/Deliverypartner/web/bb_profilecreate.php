<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
<style type="text/css">
	.center
	{background-color:#ECCA9C}
	</style>
</head>
<body>
  <?PHP
  $varlid="";
  $varname="";
  $varadd="";
  $varweb="";
  $vargst="";
  $varcon="";
  $varlogo="";
  include_once "newconnection.php";
if(isset($_POST['btn2']))
{
	$varlid= $_POST['txtid'];
	$varname=$_POST['txtname'];
	$varadd= $_POST['txtname1'];
	$varweb= $_POST['txtname2'];
    $vargst=$_POST['num'];
    $varcon=$_POST['num1'];
    $dt= date("y-m-d h:i:s");
    $varlogo=  $_FILES["img1"]["name"];	
    move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varlogo);
	$sqlins="INSERT INTO bulkbuyer_profile (BB_LOGIN_ID,COMP_NAME,COMP_ADD,COMP_WEBSITE,COMP_GST_NO,COMP_CONTACT_NO,COMP_LOGO,ACTIVE,CREATION_DATE)
    VALUES('$varlid','$varname','$varadd', '$varweb','$vargst','$varcon','$varlogo','1','$dt')";

if (mysqli_query($con,$sqlins))
{
echo "1 record added";
}
else
{
  die('Error: ' . mysqli_error($con));
}
// mysqli_close($con);
}
?>
<div class="container-fluid" >

<div class="row"> 
<div class="col-sm-3">
</div>
<div class="col-sm-6" style="background-color:#eadaec"  >

<h1> BULK BUYER PROFILE CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >


<div class="form-group">
<label for="txtid">LOGIN ID</label>
<input type="email" class="form-control" id="txtid" name="txtid" placeholder="abc@">
</div>

<div class="form-group">
<label for="txtname">COMPANY NAME</label>
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter company Name" required="required">
</div>

<div class="form-group">
<label for="txtname1">COMPANY ADDRESS</label>
<input type="text" class="form-control" id="txtname1" name="txtname1" placeholder="Enter company address" required="required">
</div>

<div class="form-group">
<label for="txtname2">COMPANY WEBSITE</label>
<input type="text" class="form-control" id="txtname2" name="txtname2" placeholder="Enter website Name" required="required">
</div>

<div class="form-group">
<label for="num">COMPANY GST NUM.</label>
<input type="number" class="form-control" id="num" name="num" placeholder="Enter GST NO.">
</div>

<div class="form-group">
<label for="num1">COMPANY CONTACT NUM.</label>
<input type="number" class="form-control" id="num1" name="num1" placeholder="Enter contact no.">
</div>

<div class="form-group">
<label for="image">COMPANY LOGO</label>
<input type="file" class="form-control" id="image" name="img1">
</div>

<fieldset class="form-group">
<legend>Active</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1">Yes</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="0" checked>No</label>
</div>
</fieldset>
<div >
<div class="row">
<div class="col-sm-6">
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>	</div>
</div>
</div>

</form></div>
</div>
</div>
</div>