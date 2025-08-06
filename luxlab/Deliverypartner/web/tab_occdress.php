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
<script type="text/javascript">
function get_subcat(idd)
{
	//alert(str);
	if(idd=="")
	{
		document.getElementById("sdiv").innerHTML="";
		return;
	}
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
document.getElementById("sdiv").innerHTML=xmlhttp.responseText;
		}
}
//alert(str);
xmlhttp.open("GET", "get_subcat.php?pid="+ idd,true);
xmlhttp.send();
}
</script>
  <?PHP
  $varoid="";
  $varcid="";
  $vardid="";
  $varimg="";
  $varsi="";
  $varavail="";
include_once "newconnection.php";
if(isset($_POST['btn2']))
{
	$varoid= $_POST['num2'];
	$varcid= $_POST['num3'];
    $vardid= $_POST['num4'];
    $varsi= $_POST['txtname'];
    $varavail=$_POST['rbact'];
	$dt= date("y-m-d h:i:s");
  $varimg=  $_FILES["img1"]["name"];	
move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varimg);
	 $sqlins="INSERT INTO tab_occasiondress(occ_id,color_id,dresstype_id,special_instruction,image,active,creation_date)
VALUES('$varoid','$varcid','$vardid','$varsi','$varimg','1','$dt')";

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

<h1>TAB OCCASSION DRESS CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label for="num4">DRESSTYPE ID</label>
<select name="num4" class="form-control border" id="num4" onchange="get_subcat(this.value);" required >
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
<select name="num3" class="form-control border" id="num3" onchange="get_subcat(this.value);" required >
<option value=""> -- Select color id-- </option>
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
<select name="num2" class="form-control border" id="num2" onchange="get_subcat(this.value);" required >
<option value=""> -- Select occasion id -- </option>
<option value="0">occasion id</option>
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
<textarea class="form-control" id="txtname" rows="3" placeholder="ENTER SPECIAL INSTRUCTION" ></textarea>
</div>

<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" id="image" name="img1">
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
<a href="tab_occdressview.php">view</a>
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

