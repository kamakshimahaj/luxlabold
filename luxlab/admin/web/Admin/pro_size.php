<?php
include "topbar.php";
?>
<title>product size creation</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
	.center
	{background-color:#ECCA9C}
	</style>
  <?PHP
  include_once "connection.php";
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
        
<!-- start your design down-->


            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- Start Blank Page -->

                        <div class="col-sm-12 text-center">
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

<div class="row mb-3">
    <div class="col-sm-4" >
        <fieldset class="mb-3" >
            <legend style="text-align:left;">ACTIVE</legend>

            <div class="col-sm-4">
              <div  class="form-check" style="margin-left:550%;margin-top:-130%;">
               <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked >
                <label class="form-check-label" >
                YES
              </label>
            </div>
           </div>
            <div class="form-check" style="margin-top:-17%;margin-left:180%;">
              
            
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                <label class="form-check-label">
                NO
              </label>
                
           </div>
    </div>
</div>
<div >
<div class="row">
<div class="col-sm-12">
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
	include_once 'connection.php';
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


                        </div>

                        <!-- End Blank Page -->

                    </div>
                </div>

                <div id="styleSelector">

                </div>
            </div>


<!-- end your design up-->
    
    

<?php
include "footer.php";
?>