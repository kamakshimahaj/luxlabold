<link rel="stylesheet" href="style.css">
<?php
include "topbar.php";
?>
<title>dresstype</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
	.center
	{background-color:#ECCA9C}
	</style>
</head>
<body>
  <?PHP
  $vartype="";
  include_once "connection.php";
if(isset($_POST['btnsub']))
{
	$vartype= $_POST['dstype'];
	$dt= date("y-m-d h:i:s");
  $sqlins="INSERT INTO tab_dresstype (dress_type,active,creation_date)
VALUES('$vartype','1','$dt')";
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
              <h1> TAB DRESSTYPE</h1>
              </div>
              
              <div class="col-sm-3">
              </div>
            </div>


            <div class="row mb-3">
<div class="col-sm-4">
<label for="dstype"><h3> DRESS TYPE</h3></label>
</div>
<div class="col-sm-8">
<input type="text" class="form-control" id="dstype" name="dstype"
 placeholder="Enter type of dress" required="required">
</div>
</div>



<div class="row mb-3">
    <div class="col-sm-4" >
        <fieldset class="mb-3" >
            <legend>ACTIVE</legend>

            <div class="col-sm-4">
              <div  class="form-check" style="margin-left:550%;margin-top:-60%;">
               <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked >
                <label class="form-check-label" >
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


<div class="row mb-3">
<div class="col-sm-12 ">
<input type="submit" name="btnsub" value="SUBMIT" class="btn btn-danger" />
</div>
</div>
<div class="row mb-3">
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