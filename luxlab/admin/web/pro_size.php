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
  include_once "newconnection.php";
  $pname="";
  $pid="";
  if(isset($_GET["id"])){
	$id=$_GET["id"];
	$sql="select* from tab_product where id=".$_GET["id"];
	$res=mysqli_query($con,$sql);
	$rowz=mysqli_fetch_array($res);
	$pname=$rowz["pro_name"];
  }
  $varpid="";
  $varsize="";
  $varun="";
  $varavail="";

if(isset($_POST['btn2']))
{
	$varpid= $_POST['num'];
	$varsize=$_POST['txtname'];
	$varun= $_POST['txtname1'];
	$varavail=$_POST['rbact'];
	$dt= date("y-m-d h:i:s");
	$sqlins="INSERT INTO pro_size(PRO_ID,PRO_SIZE,UNIT,ACTIVE,CREATION_DATE)
    VALUES('$varpid','$varsize','$varun','1','$dt')";

if (mysqli_query($con,$sqlins))
{
// echo "1 record added";
header("location:pro_size.php?id=$varpid");
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

<h1>PRODUCT SIZE CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label for="num">PRODUCT NAME</label>
<input type="text" class="form-control" id="pname" readonly name="pname"  value="<?php echo $pname;;?>" placeholder="enter product name">
<input type="hidden" class="form-control" id="num" name="num" value="<?php echo $id;?>" placeholder="enter product id">
</div>

<div class="form-group">
<label for="txtname"> PRODUCT SIZE</label>
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="enter product size" required="required">
</div>

<div class="form-group">
<label for="txtname1"> UNIT</label>
<input type="text" class="form-control" id="txtname1" name="txtname1" placeholder="Enter units" required="required">
</div>

<fieldset class="form-group">
<legend>ACTIVE</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1" >Yes</label>
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
<a href="tab_product_view.php">Go Back</a>
</div>
</div>
</div>

</form></div>
</div>
</div>
</div>

<div class="container">
  <table class="table table-hover">
    <thead>
    <tr>
    	<td colspan="5" align="center" >  <h1> PRODUCT SIZE LIST </h1> </td>
        </tr>
      <tr>
        <th>S.NO</th>
        <th>PRODUCT ID</th>
        <th>PRODUCT SIZE</th>
        <th>UNIT</th>
        <th>UPDATE / DELETE</th>
      </tr>
    </thead>
   <?php
	include_once 'newconnection.php';
	 $sqlview="SELECT * FROM pro_size";//sql query  to fetch data//
	$result= mysqli_query($con,$sqlview);//executing query//
	$sno=1;//initialising serial number//
    echo " <tbody>";//displaying the table//
   	while($row=mysqli_fetch_array($result))
{
    echo"  <tr>";
 echo "<td>".$sno."</td> <td>".$row['PRO_ID']."</td> <td>".$row['PRO_SIZE']."</td> 
   <td>".$row['UNIT']."</td> 
   <td>
    <a href='pro_sizeupdate.php?id=".$row['id']."' > Update </a> ||
	<a href='pro_sizedelete.php?idd=".$row['id']."' > delete</a></td>
    </tr>";
	  $sno++;
}
 echo " </tbody>
  </table>";
  ?>
</div>


</body>
</html>
