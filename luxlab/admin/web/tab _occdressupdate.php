<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>New Person Creation</title>
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
$varid="" ;
$varoid="";
$varcid= "";
$vardid= "";
$varsi= "";
$varimg= "";


if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM tab_occasiondress where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
	$varoid=$row['occ_id'];
	$varcid= $row['color_id'];
    $vardid= $row['dresstype_id'];
    $varsi= $row['special_instruction'];
  $varimg= $row['image'];
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
	 $sqlupd="update tab_occasiondress set occ_id='$_POST[num2]', color_id= '$_POST[num3]',dresstype_id= '$_POST[num4]',special_instruction='$_POST[txtname]',image='$varimg' where id='$_POST[txtid]'";
   if (!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location:tab occdress view.php");
 mysqli_close($con);
   }
 ?> 
<div class="container-fluid" >

<div class="row"> 
<div class="col-sm-3">
</div>
<div class="col-sm-6" style="background-color:#eadaec"  >

<h1>TAB OCCASION DRESS CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label for="num4">DRESSTYPE ID</label>
<input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
<select name="num4" class="form-control border" id="num4"  value="<?php echo $vardid; ?>" onchange="get_subcat(this.value);" required >
<option value=""> -- Select dresstype id -- </option>
<option value="0">dresstype id</option>
<?php
$sqlparent="select * from tab_dresstype";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['dresstype']."</option>";
}
?>
</select>
</div>

<div class="form-group">
<label for="num3">COLOR ID</label>
<select name="num3" class="form-control border" id="num3" value="<?php echo $varcid; ?>" onchange="get_subcat(this.value);" required >
<option value=""> -- Select color id -- </option>
<option value="0">color id</option>
<?php
$sqlparent="select * from tab_color";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['color']."</option>";
}
?>
</select>
</div>

<div class="form-group">
<label for="num2">OCCASION ID</label>
<select name="num2" class="form-control border" id="num2"  value="<?php echo $varoid; ?>" onchange="get_subcat(this.value);" required >
<option value=""> -- Select occasion id -- </option>
<option value="0">occasion</option>
<?php
$sqlparent="select * from tab_occasion ";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['occasion']."</option>";
}
?>
</select>
</div>


<div class="form-group">
<label for="txtname">SPECIAL INSTRUCTION</label>
<textarea class="form-control" id="txtname" rows="3"  value="<?php echo $varsi; ?>" placeholder="ENTER SPECIAL INSTRUCTION" ></textarea>
</div>


<div class="form-group">
<label for="image">Image</label>
<input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
<input type="file" class="form-control" id="image" name="img1" >
<img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
</div>


<fieldset class="form-group">
<legend>ACTIVE</legend>
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
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>
<a href="tab occdress view.php">view</a>
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
