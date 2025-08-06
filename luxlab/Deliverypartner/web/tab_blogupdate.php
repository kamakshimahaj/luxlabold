<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>blog update</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


  <style type="text/css">
  .back{
    background-color: silver;
  }
input[type="text"], input[type="email"], input[type="password"]
{
  border: 2px solid black;
}
</style>
</head>

<body>
<?PHP
include_once "newconnection.php";
$vartitle="";
$vardes="";
$varimg="";
$varby="";
$varbdate="";
$varvid="";
$varavail="";

if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM tab_blog where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
  $vartitle= $row['blog_title'];
	$vardes=$row['blog_description'];
	$varby=$row['blog_by'];
	$varbdate= $row['blog_date'];
  $varimg= $row['blog_image'];
  $varvid=$row['blog_video'];
  $varavail=$row['status'];
		}
}
if(isset($_POST['btn2']))
	{
		if(isset($_FILES['img1']) && !empty($_FILES['img1']['name']))
			{
      // uploading image if user choose new image to update 
			move_uploaded_file($_FILES['img1']['tmp_name'],"screenshots/".$_FILES['img1']['name']);
			$varimg=$_FILES['img1']['name'];
			}
			else
			{
			$varimg= $_POST['txtimg1'];  // getting image value from hidden text box
			}
            if(isset($_FILES['img2']) && !empty($_FILES['img2']['name']))
			{
      // uploading image if user choose new image to update 
			move_uploaded_file($_FILES['img2']['tmp_name'],"screenshots/".$_FILES['img2']['name']);
			$varvid=$_FILES['img2']['name'];
			}
			else
			{
			$varvid= $_POST['txtimg2'];  // getting image value from hidden text box
			}
	 $sqlupd="update tab_blog  set blog_title='$_POST[txtname]',blog_description='$_POST[txtname1]',blog_image='$varimg', blog_by= '$_POST[txtname2]',blog_video='$varvid',blog_date='$_POST[stdate]' where id='$_POST[txtid]'";
   if (!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location:tab_blogview.php");
 mysqli_close($con);
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
<input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter blog title" required="required" value="<?php echo $vartitle; ?>">
</div>

<div class="form-group">
<label for="txtname1">BLOG DESCRIPTION</label>
<textarea class="form-control" id="txtname1"   name="txtname1" rows="50" placeholder="Enter blog description" ><?php echo $vardes; ?>"</textarea>
</div>

<div class="form-group">
<label for="image">BLOG IMAGE</label>
<input type="file" class="form-control" id="image" name="img1">
<input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
<img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
</div>

<div class="form-group">
<label for="txtname2">BLOG BY</label>
<input type="text" class="form-control" id="txtname2" name="txtname2" placeholder="Enter website Name" required="required" value="<?php echo $varby; ?>">
</div>

<div class="form-group">
<label for="image">BLOG VIDEO</label>
<input type="file" class="form-control" id="image2" name="img2">
<input type="hidden" name="txtimg2" value="<?php echo $varvid; ?>" />
<img src='screenshots/<?php echo $varvid; ?>' width="100px" height="100px"/>
</div>

<div class="form-group">
<label for="stdate">BLOG DATE</label>
<input type="date" class="form-control" id="stdate" name="stdate"  required="required" value="<?php echo $varbdate; ?>">
</div>

<fieldset class="form-group">
<legend>status</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1"  <?php if($varavail==1) echo "checked"; ?> >Yes</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="0"  <?php if($varavail==0) echo "checked"; ?>>No</label>
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