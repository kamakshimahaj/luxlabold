<?php
include "topbar.php";
?>
<title>dresstype update</title>
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
$varid="" ;
$vartype="";
if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM tab_dresstype where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
  $vartype=$row['dress_type'];
	}
}
if(isset($_POST['btnsub']))
	{
	 $sqlupd="update tab_dresstype set dress_type='$_POST[dstype]' where id='$_POST[txtid]'";
   if(!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location:dresstype_view.php");
 mysqli_close($con);
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
              <h1> TAB_DRESSTYPE </h1>
              </div>
              
              <div class="col-sm-3">
              </div>
            </div>


            <div class="row mb-3">
<div class="col-sm-4">
<label for="dstype"><h3> DRESS TYPE</h3></label>
</div>
<div class="col-sm-8">
<input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
<input type="text" class="form-control" id="dstype" name="dstype"
 placeholder="Enter type of dress" required="required" value="<?php echo $vartype; ?>">
</div>
</div>



<div class="row-mb-3">
    <div class="col-sm-4">
        <fieldset class="mb-3" >
            <legend>ACTIVE</legend>
            <div class="col-sm-4">
            <div  class="form-check" style="margin-left:550%;margin-top:-60%;">
               <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked>
                <label class="form-check-label">
                YES
              </label>
            </div>
           </div>
            <div class="form-check" style="margin-top:-13%;margin-left:180%;">
              
            
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
<div class="row-mb-3">
<div class="col-sm-12">
<!-- <button type="submit" name="btnsub" class="btn btn-success">UPDATE</button> -->
<a href=" dresstype_view.php">VIEW</a>
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