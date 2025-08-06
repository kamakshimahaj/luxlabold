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
  $vartitle="";
  $varstdate="";
  $varendate="";
  $varper="";
  $varimg="";
include_once "newconnection.php";
if(isset($_POST['btnsub']))
{
	$vartitle= $_POST['offtitle'];
	$varstdate=$_POST['stdate'];
	$varendate= $_POST['enddate'];
	$varper= $_POST['offper'];
	$dt= date("y-m-d h:i:s");
  $varimg=  $_FILES["txtimg"]["name"];	
move_uploaded_file($_FILES["txtimg"]["tmp_name"],"screenshots/".$varimg);
	 $sqlins="INSERT INTO tab_offer (offer_title,start_date,end_date,offer_percentage,offer_image,active,creation_date)
VALUES('$vartitle','$varstdate','$varendate', '$varper','$varimg','1','$dt')";

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
                  <h1> OFFER CREATION</h1>
                  </div>
                  
                  <div class="col-sm-3">
                  </div>
                </div>


                <div class="row mb-3">
                        <div class="col-sm-4">
                      <label for="offtitle">OFFER TITLE</label>
                        </div>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="offtitle" name="offtitle"
                        placeholder="Enter offer title" required="required">
                        </div>
                  </div>
    
<div class="row mb-3">
        <div class="col-sm-4">
            <label for="stdate">START DATE</label>
            </div>
            <div class="col-sm-8">
            <input type="date" class="form-control" id="stdate" name="stdate" placeholder="enter offer start date" required="required">
            </div>
    </div>
    <div class="row mb-3">
          <div class="col-sm-4">
              <label for="endate">END DATE</label>
              </div>
              <div class="col-sm-8">
              <input type="date" class="form-control" id="enddate" name="enddate" placeholder="enter offer end date" required="required">
              </div>
    </div>
    <div class="row mb-3">
<div class="col-sm-4">
    <label for="offper">PERCENTAGE</label>
    </div>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="offperer" name="offper" placeholder="enter offer percentage" required="required">
         </div>
     </div>
     <div class="row mb-3">
<div class="col-sm-4">
        <label for="txtimg">OFFER IMAGE</label>
        </div>
        <div class="col-sm-8">
        <input type="file"class="form-control" name="txtimg" id="txtimg" >
      </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-4">
            <fieldset class="mb-3">
                <legend>ACTIVE</legend>
                </div>
        <div class="col-sm-8">
                <div  class="form-check">
                  
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked>
                    <label class="form-check-label">
                    YES
                  </label>
               </div>
                <div class="form-check">
                
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
  <a href="offerview.php">view</a>
</div>
</div>
<!-- <div class="row mb-3">
<div class="col-sm-12">
  <button type="submit" name="btn2" class="btn btn-success">UPDATE</button>
  <a href="offerview.php">view</a>
</div>
</div> -->
</form>
    </div>
    <div class="col-sm-2 ">
    </div>
    </div>
    </div>
</body>
</html>