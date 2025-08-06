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
  $varpn="";
  $varpd="";
  $varpcat="";
  $varscat="";
  $varimg="";
  $varps="";
  $varpp="";
  $varct="";
include_once "newconnection.php";
if(isset($_POST['btn2']))
{
	$varpn= $_POST['txtname'];
	$varpd=$_POST['txtname3'];
	$varpcat= $_POST['ddlparent'];
	$varscat= $_POST['ddlsub'];
  $varps= $_POST['txtname2'];
  $varpp= $_POST['num'];
  $varct= $_POST['ccltype'];
  $varpcat= ($varpcat!=0)?"'$varpcat'": "NULL";
  $varscat= ($varscat!=0)?"'$varscat'": "NULL";
  $dt= date("y-m-d h:i:s");
  $varimg=  $_FILES["img1"]["name"];	
    move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varimg);
	$sqlins="INSERT INTO tab_product (pro_name,pro_details,parent_cat,sub_cat,pro_img,pro_size,pro_price,cul_type,available,creation_date)
    VALUES('$varpn','$varpd',$varpcat, $varscat,'$varimg','$varps','$varpp','$varct','1','$dt')";

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
<label for="txtname">PRODUCT NAME</label>
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="ENTER PRODUCT NAME">
</div>

<div class="form-group">
<label for="txtname3">PRODUCT DETAILS</label>
<textarea class="form-control" id="txtname3" name="txtname3" rows="3" placeholder="ENTER PRODUCT DETAILS" ></textarea>
</div>

<div class="form-group">
<label for="ddlparent">PARENT CATEGORY</label>
<select name="ddlparent" class="form-control border" id="ddlparent" onchange="get_subcat(this.value);" required >
<option value=""> -- Select Parent Category -- </option>
<option value="0">Parent</option>
<?php
$sqlparent="select * from tab_category where parent_cat is NULL";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['cat_name']."</option>";
}
?>
</select>
</div>

<div class="form-group">
<label for ="ddlsub"> Sub Category <span class="required">*</span></label>
<div id="sdiv">
<select class="form-control border" name="ddlsub" required>
<option value=""> -- Select Sub Category -- </option>
<option value="0">None</option>
</select>
</select>
</div>

 <!-- <div class="form-group">
<label for="ddlsubsub">SUBSUB CATEGORY</label>
<select name="ddlsubsub" class="form-control border" id="ddlsubsub" onchange="get_subcat(this.value);" required >
<option value=""> -- Select subsub Category -- </option>
<option value="0">subsub</option>
</select>
</div>  -->

<div class="form-group">
<label for="image">PRODUCT IMAGE</label>
<input type="file" class="form-control" id="image" name="img1">
</div>

<div class="form-group">
<label for="txtname2"> PRODUCT SIZE</label>
<input type="text" class="form-control" id="txtname2" name="txtname2" placeholder="ENTER PRODUCT SIZE" required="required">
</div>

<div class="form-group">
<label for="num">PRODUCT PRICE</label>
<input type="num" class="form-control" id="num" name="num" placeholder="ENTER PRODUCT PRICE">
</div>

<div class="form-group">
<label for="ccltype">CULTURE TYPE</label>
<select multiple class="form-select"   name="ccltype" id="ccltype">
     <option value="">select culture type</option>
     <option value="western">western</option>
     <option value="punjab">punjab</option>
     <option value="jodhpur">jodhpur</option>
     <option value="jaipur">jaipur </option>
	 <option value="south indian">south indian </option>
</select>
</div>

<fieldset class="form-group">
<legend>AVL</legend>
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
<a href="tab_product_view.php">view</a>
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
