<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
    .center {
        background-color: #ECCA9C
    }
    </style>
</head>

<body>
<?php
$varpid="";
$varoid= "";
$varcm= "";
$varavail="";
$varimg="";
include_once "newconnection.php";
if(isset($_POST['btn2']))
{
	$varpid=$_POST['num'];
	$varoid= $_POST['num2'];
    $varcm= $_POST['txtname'];
    $varavail=$_POST['rbact'];
	$dt= date("y-m-d h:i:s");
  $varimg=  $_FILES["img1"]["name"];	
move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varimg);
$sqlins="INSERT INTO pro_occasion(pro_id,occ_id,image,active,creation_date,special_comment)
VALUES('$varpid','$varoid','$varimg','1','$dt','$varcm')";

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

<h1>PRODUCT OCCASION CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

 <div class="form-group">
<label for="num">PRO ID</label>
<input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
<input type="num" class="form-control" id="num" name="num" placeholder="ENTER PRODUCT ID"  value="<?php echo $varpid; ?>" >
</div>

<div class="form-group">
<label for="num2">OCCASION ID</label>
<select name="num2" class="form-control border" id="num2"  value="<?php echo $varoid; ?>" onchange="get_subcat(this.value);" required >
<option value=""> -- Select occasion id -- </option>
<option value="0">occasion</option>
<?php
$sqlparent="select * from tab_occasiondress ";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['occ_id']."</option>";
}
?>
</select>
</div>

<div class="form-group">
<label for="image">Image</label>
<input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
<input type="file" class="form-control" id="image" name="img1" >
<img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
</div>

<div class="form-group">
<label for="txtname">SPECIAL COMMENT</label>
<textarea class="form-control" id="txtname" rows="3" placeholder="ENTER SPECIAL INSTRUCTION" ></textarea>
</div>

<fieldset class="form-group">
<legend>ACTIVE</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1"  >Yes</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="0"  >No</label>
</div>
</fieldset>
<div >
<div class="row">
<div class="col-sm-6">
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>
<a href="pro_occasionview.php">view</a>
</div>
</div>
</div>
</div>

</form></div>
</div>
</div>
</div>
</body>
</html>
