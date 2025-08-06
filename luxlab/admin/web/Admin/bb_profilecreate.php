<?php
include "topbar.php";
?>
<title>bulk buyer profile</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
	.center
	{background-color:#ECCA9C}
	</style>
  <?PHP

  $varname="";
  $varadd="";
  $varweb="";
  $vargst="";
  $varcon="";
  $varlogo="";
  include_once "connection.php";
if(isset($_POST['btn2']))
{
	
	$varname=$_POST['txtname'];
	$varadd= $_POST['txtname1'];
	$varweb= $_POST['txtname2'];
    $vargst=$_POST['num'];
    $varcon=$_POST['num1'];
    $dt= date("y-m-d h:i:s");
    $varlogo=  $_FILES["img1"]["name"];	
    move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varlogo);
	$sqlins="INSERT INTO bulkbuyer_profile (COMP_NAME,COMP_ADD,COMP_WEBSITE,COMP_GST_NO,COMP_CONTACT_NO,COMP_LOGO,ACTIVE,CREATION_DATE)
    VALUES('$varname','$varadd', '$varweb','$vargst','$varcon','$varlogo','1','$dt')";

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

<h1> BULK BUYER PROFILE CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label for="txtname">COMPANY NAME</label>
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter company Name" required="required">
</div>

<div class="form-group">
<label for="txtname1">COMPANY ADDRESS</label>
<textarea class="form-control" id="txtname1" name="txtname1" rows="3" placeholder="Enter company address" ></textarea>
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

<div class="row-mb-3">
    <div class="col-sm-4">
        <fieldset class="mb-3">
            <legend style="text-align:left;">ACTIVE</legend>
            <div class="col-sm-4">
            <div  class="form-check" style="margin-left:580%;margin-top:-130%;">
               <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked>
                <label class="form-check-label">
                YES
              </label>
            </div>
           </div>
            <div class="form-check" style="margin-left:180%;margin-top:-20%;">
              
            
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
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>	</div>
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