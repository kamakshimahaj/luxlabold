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
  $vartitle="";
  $vardes="";
  $varimg="";
  $varby="";
  $varbdate="";
  $varvid="";
  
include_once "newconnection.php";
if(isset($_POST['btn2']))
{
	$vartitle= $_POST['txtname'];
    $vardes= $_POST['txtname1'];
	$varby=$_POST['txtname2'];
	$varbdate= $_POST['stdate'];
	$dt= date("y-m-d h:i:s");
    $varvid= $_FILES["img2"]["name"];	
    move_uploaded_file($_FILES["img2"]["tmp_name"],"screenshots/".$varvid);
  $varimg=  $_FILES["img1"]["name"];	
move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varimg);
	 $sqlins="INSERT INTO tab_blog (blog_title,blog_description,blog_image,blog_by,blog_video,blog_date,status,creation_date)
VALUES('$vartitle','$vardes','$varimg', '$varby','$varvid','$varbdate','1','$dt')";

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

<h1> BLOG CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label for="txtname">BLOGTITILE</label>
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter blog title" required="required">
</div>

<div class="form-group">
<label for="txtname1">BLOG DESCRIPTION</label>
<textarea class="form-control" id="txtname1"   name="txtname1" rows="50" placeholder="Enter blog description" ></textarea>
</div>

<div class="form-group">
<label for="image">BLOG IMAGE</label>
<input type="file" class="form-control" id="image" name="img1">
</div>

<div class="form-group">
<label for="txtname2">BLOG BY</label>
<input type="text" class="form-control" id="txtname2" name="txtname2" placeholder="Enter website Name" required="required">
</div>

<div class="form-group">
<label for="image">BLOG VIDEO</label>
<input type="file" class="form-control" id="image2" name="img2">
</div>

<div class="form-group">
<label for="stdate">BLOG DATE</label>
<input type="date" class="form-control" id="stdate" name="stdate"  required="required">
</div>

<fieldset class="form-group">
<legend>status</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1"  >Yes</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="0" >No</label>
</div>
</fieldset>
<div >
<div class="row">
<div class="col-sm-6">
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>
<a href="tab_blogview.php">view</a>	</div>
</div>
</div>

</form></div>
</div>
</div>
</div>