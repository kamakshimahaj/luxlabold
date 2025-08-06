<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>New Person Creation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


  <style type="text/css">
  .back{
    background-color: silver;
  }
input[type="text"], input[type="email"], input[type="password"]
{
  border: 2px solid black;
}
</style>
</head>

<body>
<?PHP
include_once "newconnection.php";
$varid="" ;
$varoc="";
if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM tab_occasion where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
    $varoc=$row['occ_name'];
	}
}
if(isset($_POST['btnsub']))
	{
	 $sqlupd="update tab_occasion set occ_name='$_POST[octype]'where id='$_POST[txtid]'";
   if (!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location:occasion_view.php");
 mysqli_close($con);
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
              <h1> TAB_OCCASION</h1>
              </div>
              
              <div class="col-sm-3">
              </div>
            </div>


            <div class="row mb-3">
<div class="col-sm-4">
<label for="octype"><h3> OCCASION NAME</h3></label>
</div>
<div class="col-sm-8">
<input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
<input type="text" class="form-control" id="octype" name="octype"
 placeholder="Enter type of occasion" required="required" value="<?php echo $varoc; ?>">
</div>
</div>



<div class="row-mb-3">
    <div class="col-sm-4">
        <fieldset class="mb-3">
            <legend>ACTIVE</legend>
            <div class="col-sm-4">
            <div  class="form-check">
               <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked>
                <label class="form-check-label">
                YES
              </label>
            </div>
           </div>
            <div class="form-check">
              
            
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
<a href="occasion_view.php">VIEW</a>
</div>
</div>
</form>
</div>
<div class="col-sm-2 ">
</div>
</div>
</div>
</body>
</html>
  
