<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Person Creation</title>
<link rel="stylesheet" href="../css/bootstrap.min.css" >
<link rel="stylesheet" href="../css/bootstrap-theme.min.css" i>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js" ></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Latest compiled JavaScript -->
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
$varun="";
$varuid=""; //local variables//
$varpass="";
$vargen="";
$varquali="";
$varimg="";
include_once "connection.php";//including file named connection.php//
if(isset($_POST['btnsub']))
{
	$varun= $_POST['txtname'];
	$varuid=$_POST['txtuid'];
	$varpass= $_POST['txtpass'];
	$vargen= $_POST['rbgen'];
	$varquali=$_POST['ddlquali'];
	$dt= date("y-m-d h:i:s");
$varimg1=  $_FILES["txtimg"]["name"];	
move_uploaded_file($_FILES["txtimg"]["tmp_name"],"screenshots/".$varimg1);
	 $sqlins="INSERT INTO personinfo (name,userid,password,gender,quali,image,status,creation_date)
VALUES('$varun','$varuid','$varpass','$vargen', '$varquali','$varimg1','1','$dt')";

if (mysqli_query($con,$sqlins))
{
echo "1 record added";
}
else
{
  die('Error: ' . mysqli_error($con));
}
mysqli_close($con);
}
// here mysqli_query,mysqli_errors are function and $con,$sqlins are variables if mysqli_query func will successfully implemented then 1 row will be inserted into the table else mysqli_error func will be executed and connection will die//
?>

<div class="container back">
    	<div class="row">
            <div class="col-sm-6">
       <h1> New Person Creation </h1>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" ><!--enctype=specifying the encoding type.allows file to be uploaded-->
           <div class="row mb-3">
           <div class="col-sm-4">
           <label for="txtname">User Name</label>
           </div>
           <div class="col-sm-8">
    <input type="text" class="form-control" id="txtname" name="txtname"
      placeholder="Enter User Name" pattern="[A-Za-z ]{0,}">
      </div>
           </div>
            <div class="row mb-3">
              <div class="col-sm-4">
    <label for="txtuid">User ID</label>
  </div>
  <div class="col-sm-8">
    <input type="email" class="form-control" id="txtuid" name="txtuid"
     aria-describedby="uidhelp" placeholder="Enter email">
    <small id="uidhelp" class="form-text text-muted">Please Provide Your Valid Email Id, As you password will be send on it Eg : abc@xyz.com </small>
  </div>
    </div>
     <div class="row mb-3">
    <label for="txtpass">Password</label>
    <input type="password" class="form-control" id="txtpass" name="txtpass"
      placeholder="Enter User Password">
    
    
  </div>
  <fieldset class="row mb-3">
    <legend>GENDER</legend>
    <div class="form-check">
      <label class="form-check-label">
<input type="radio" class="form-check-input" name="rbgen" id="rbmale" value="M" checked>
        MALE
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="rbgen" id="rbfemale" value="F">
       Female
      </label>
    </div>
   
  </fieldset>
  
  
  <div class="row mb-3">
    <label for="ddlquali">Qualification</label>
    <select class="form-control" id="ddlquali" name="ddlquali">
      <option value="10">Metric</option>
      <option value="12">Sr. Sec.</option>
      <option value="graduate">Graduation</option>
      <option value="pg">Post Graduation</option>
      <option value="Phd">Phd</option>
    </select>
  </div>
  
 <!--  <div class="form-group">
    <label for="txtadd">Address</label>
    <textarea class="form-control" id="txtadd" name="txtadd" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="txtmob">Salary</label>
    <input type="text" class="form-control" id="txtsal" name="txtsal"
      placeholder="Enter Salary" >
    
    </div>
    
    
  <div class="form-group">
    <label for="txtdob">Date Of Birth</label>
    <input type="date" class="form-control" id="txtdob" name="txtdob"
      placeholder="Enter your DOB">
    
    </div> -->
    <div class="row mb-3">
    <label for="txtimg">Image</label>
    <input type="file" class="form-control" id="txtimg" name="txtimg">
    
    </div>
    
    <div >
    
    		<div class="row mb-3">
            	<div class="col-sm-6">
       	<button type="submit" name="btnsub" class="btn btn-block btn-primary">Submit</button>    	</div>
                    
                 <div class="col-sm-6">
         	<button type="reset" class="btn btn-block btn-danger">Cancel</button>
          <a href="recordfetchview.php"> VIEW </a>
              			</div>   
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