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


<?php

include_once "connection.php";
$varid="";
$varun="";
$varuid="";
$varpass="";
$vargen="";
$varquali="";
$varadd="";
$vardob="";
$varsal="";
$varimg="";

if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM personinfo where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
	$varun= $row['name'];
	$varuid=$row['userid'];
	$varpass= $row['password'];
	$vargen= $row['gender'];
  $varquali=$row['quali'];
	$varimg=$row['image'];

	
	
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
	 $sqlupd="update personinfo  set name='$_POST[txtname]',userid='$_POST[txtuid]',password='$_POST[txtpass]', gender= '$_POST[rbgen]',quali='$_POST[ddlquali]',image='$varimg' where id='$_POST[txtid]'";
if (!mysqli_query($con,$sqlupd))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";
header("location:recordfetchview.php");

mysqli_close($con);
	
}



?>


<div class="container back">
    	<div class="row">
            <div class="col-sm-6">
           
           <h1> New Person Creation </h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
           
           <div class="form-group">
           
           <div class="col-sm-4">
           <label for="txtname">User Name</label>
           </div>
           <div class="col-sm-8">
 <input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
    <input type="text" class="form-control" id="txtname" name="txtname"
      placeholder="Enter User Name" value="<?php echo $varun; ?>" >
      </div>
           </div>
            <div class="form-group">
    <label for="txtuid">User ID</label>
    <input type="email" class="form-control" id="txtuid" name="txtuid"
     aria-describedby="uidhelp" placeholder="Enter email" value="<?php echo $varuid; ?>">
    <small id="uidhelp" class="form-text text-muted">Please Provide Your Valid Email Id, As you password will be send on it Eg : abc@xyz.com </small>
    </div>
     <div class="form-group">
    <label for="txtpass">Password</label>
    <input type="password" class="form-control" id="txtpass" name="txtpass"
      placeholder="Enter User Password" value="<?php echo $varpass; ?>">
    
    
  </div>
  <fieldset class="form-group">
    <legend>SEX</legend>
    <div class="form-check">
      <label class="form-check-label">
<input type="radio" class="form-check-input" name="rbgen" id="rbmale" value="M" <?php if($vargen=="M")  echo "checked"; ?> >
        MALE
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
<input type="radio" class="form-check-input" name="rbgen" id="rbfemale" value="F" <?php if($vargen=="F")  echo "checked"; ?>>
       Female
      </label>
    </div>
   
  </fieldset>
  
  
  <div class="form-group">
    <label for="ddlquali">Qualification</label>
    <select class="form-control" id="ddlquali" name="ddlquali">
<option value="10" <?php if($varquali=="10") echo "selected"; ?> >Metric</option>
<option value="12" <?php if($varquali=="12") echo "selected"; ?>>Sr. Sec.</option>
<option value="graduate" <?php if($varquali=="graduate") echo "selected"; ?>>Graduation</option>
<option value="pg" <?php if($varquali=="pg") echo "selected"; ?>>Post Graduation</option>
<option value="Phd" <?php if($varquali=="Phd") echo "selected"; ?>>Phd</option>
    </select>
  </div>
  
      
   
    <div class="form-group">
    <label for="txtimg">Image</label>
    <input type="file" class="form-control" id="fileup" name="fileup">
    <input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
    <img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
     
    </div>
    
    <div >
    
    		<div class="row">
            	<div class="col-sm-6">
<button type="submit" name="btnsub" class="btn btn-block btn-primary">Update</button>  	</div>
                    
                 <div class="col-sm-6">
         	<button type="reset" class="btn btn-block btn-danger">Cancel</button>  	</div>   
           	</div>
	</div>
    
</div>

</div>

</form>


<hr/>
<hr/>


 




</div>
</div>
</div>
</body>

</html>