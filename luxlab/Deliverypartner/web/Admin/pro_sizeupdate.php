<?php
include "topbar.php";
?>
<title>product size update</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
  .back{
    background-color: silver;
  }
input[type="text"], input[type="email"], input[type="password"]
{
  border: 2px solid black;
}
</style>

<?PHP
include_once "connection.php";
$pname="";
$id="";
$varid="" ;
$varpid="";
$varsize="";
$varun="";
$varavail="";
if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM pro_size where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
  $varpid= $row['PRO_ID'];
	$varsize=$row['PRO_SIZE'];
	$varun=$row['UNIT'];
  $varavail=$row['ACTIVE'];
  echo $sql="select* from tab_product where id=".$row["PRO_ID"];
  $res=mysqli_query($con,$sql);
  $rowz=mysqli_fetch_array($res);
  $pname=$rowz["pro_name"];
}
}
if(isset($_POST['btn2']))
	{
	 $sqlupd="update pro_size  set PRO_ID='$_POST[num]',PRO_SIZE='$_POST[txtname]',UNIT='$_POST[txtname1]' where id='$_POST[txtid]'";
   if (!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location:pro_sizeview.php");
 mysqli_close($con);
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
<input type="text" class="form-control" id="pname" readonly name="pname"  value="<?php echo $pname;?>" placeholder="enter product name">
<input type="hidden" class="form-control" id="num" name="num" value="<?php echo $id;?>" placeholder="enter product id">
<input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
</div>

<div class="form-group">
<label for="txtname"> PRODUCT SIZE</label>
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="enter product size" required="required" value="<?php echo $varsize; ?>" >
</div>

<div class="form-group">
<label for="txtname1"> UNIT</label>
<input type="text" class="form-control" id="txtname1" name="txtname1" placeholder="Enter units" required="required" value="<?php echo $varun; ?>" >
</div>

<div class="row mb-3">
    <div class="col-sm-4" >
        <fieldset class="mb-3" >
            <legend style="text-align:left;">ACTIVE</legend>

            <div class="col-sm-4">
              <div  class="form-check" style="margin-left:550%;margin-top:-1300%;">
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
<a href="pro_sizeview.php">view</a>
</div>
</div>
</div>

</form></div>
</div>
</div>
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