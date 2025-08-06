<?php
include "topbar.php";
?>
<title>occasion</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
	.center
	{background-color:#ECCA9C}
	</style>

  <?PHP
  $varoc="";
  include_once "connection.php";
if(isset($_POST['btnsub']))
{
	$varoc= $_POST['octype'];
	$dt= date("y-m-d h:i:s");
  $sqlins="INSERT INTO tab_occasion (occ_name,active,creation_date)
VALUES('$varoc','1','$dt')";
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
                        <div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 ">
    </div>

        <div class="col-sm-8 center ">

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-3">
              </div>
              
              <div class="col-sm-6">
              <h1> TAB OCCASION</h1>
              </div>
              
              <div class="col-sm-3">
              </div>
            </div>


            <div class="row mb-3">
<div class="col-sm-4">
<label for="octype"><h5> OCCASION NAME</h5></label>
</div>
<div class="col-sm-8">
<input type="text" class="form-control" id="octype" name="octype"
 placeholder="Enter name of occasion" required="required">
</div>
</div>



<div class="row-mb-3">
    <div class="col-sm-4">
        <fieldset class="mb-3">
            <legend>ACTIVE</legend>
            <div class="col-sm-4">
            <div  class="form-check" style="margin-left:550%;margin-top:-60%;">
               <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked>
                <label class="form-check-label">
                YES
              </label>
            </div>
           </div>
            <div class="form-check" style="margin-left:180%;margin-top:-13%;">
              
            
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                <label class="form-check-label">
                NO
              </label>
            
           </div>
    </div>
</div>

<div class="row-mb-3">
<div class="col-sm-12 ">
<input type="submit" name="btnsub" value="SUBMIT" class="btn btn-danger" />
</div>
</div>
<!-- <div class="row-mb-3">
<div class="col-sm-12">
 <button type="submit" name="btnsub" class="btn btn-success">UPDATE</button>  -->
<a href=" occasion_view.php">VIEW</a>
</div>
</div>
</form>
</div>
<div class="col-sm-2 ">
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