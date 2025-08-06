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
$vartitle="";
$varstdate="";
$varendate="";
$varper= "";
$varimg= "";

if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM tab_offer where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
  $vartitle= $row['offer_title'];
	$varstdate=$row['start_date'];
	$varendate=$row['end_date'];
	$varper= $row['offer_percentage'];
  $varimg= $row['offer_image'];
		}
}
if(isset($_POST['btnsub']))
	{
		if(isset($_FILES['fileup']) && !empty($_FILES['fileup']['name']))
			{
      // uploading image if user choose new image to update 
			move_uploaded_file($_FILES['fileup']['tmp_name'],"screenshots/".$_FILES['fileup']['name']);
			$varimg=$_FILES['fileup']['name'];
			}
			else
			{
			$varimg= $_POST['txtimg1'];  // getting image value from hidden text box
			}
	 $sqlupd="update tab_offer  set offer_title='$_POST[offtitle]',start_date='$_POST[stdate]',end_date='$_POST[enddate]', offer_percentage= '$_POST[offper]',offer_image='$varimg' where id='$_POST[txtid]'";
   if (!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location:offerview.php");
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
                        <input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
                        <input type="text" class="form-control" id="offtitle" name="offtitle"
                        placeholder="Enter offer title" required="required" value="<?php echo $vartitle; ?>">
            
                        </div>
                  </div>
    
<div class="row mb-3">
        <div class="col-sm-4">
            <label for="stdate">START DATE</label>
            </div>
            <div class="col-sm-8">
            <input type="date" class="form-control" id="stdate" name="stdate" placeholder="enter offer start date" required="required" value="<?php echo $varstdate; ?>" >
            </div>
    </div>
    <div class="row mb-3">
          <div class="col-sm-4">
              <label for="enddate">END DATE</label>
              </div>
              <div class="col-sm-8">
              <input type="date" class="form-control" id="enddate" name="enddate" placeholder="enter offer end date" required="required" value="<?php echo $varendate; ?>">
              </div>
    </div>
    <div class="row mb-3">
<div class="col-sm-4">
    <label for="offper">PERCENTAGE</label>
    </div>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="offperer" name="offper" placeholder="enter offer percentage" required="required" value="<?php echo $varper; ?>">
         </div>
     </div>
     <div class="row mb-3">
<div class="col-sm-4">
        <label for="txtimg">OFFER IMAGE</label>
        </div>
        <div class="col-sm-8">
        <input type="file"  class="form-control" name="fileup" id="txtimg" >
        <input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
        <img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
      </div>
    </div>
    
    <div class="row mb-3">
        
            <fieldset class="mb-3">
            <div class="col-sm-4">
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
  <div class="col-sm-4"></div>
  <div class="col-sm-8">
  <input type="submit" name="btnsub" value="SUBMIT" class="btn btn-danger" />

  <!-- <button type="submit" name="btn2" class="btn btn-success">UPDATE</button> -->
  <a href="offerview.php">view</a>
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


	