<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Creation</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		function checkid(idd)
		{
			if(idd=="")
			{
				document.getElementById("sdiv").innerHTML="";
				return;
			}
			if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
document.getElementById("sdiv").innerHTML=xmlhttp.responseText;
		}
}
xmlhttp.open("GET", "checkidrequestcust.php?pid="+idd,true); //write the file name in get query string
xmlhttp.send();
		}
	</script>

<?php

include_once 'function.php';
include_once 'newconnection.php';
$obj1=new utilfunction();  // creating class object 
$varnm="";
$varlid="";
$varpass="";
$varimg="";
$varmob="";
if(isset($_POST['btn2']))
{
$varnm=$_POST['txtname'];
$varlid=$_POST['txtid'];
//$varpass=$_POST['txtpass'];

$varpass= $obj1->random_password();// generating random password

$varpass1= $obj1->encrypt($varpass);
$varactive=$_POST['rbact'];   // $varactive=1;
$varmob=$_POST['num'];
$dt=date("y-m-d h:i:s");
$sqlchk="SELECT * FROM tab_admin where login_id='".$varlid."'";
          $result=mysqli_query($con,$sqlchk);
          $rowcount= mysqli_num_rows($result);
          if($rowcount==0)
            {
                move_uploaded_file($_FILES['img1']['tmp_name'], "screenshots/".$_FILES['img1']['name']);
				 $img="screenshots/".$_FILES['img1']['name'];

				
                echo $sql="INSERT INTO tab_admin(admin_name,login_id,password,admin_image, admin_mobno,active,creation_date)	
				Values('$varnm', '$varlid','$varpass1', '$varimg','$varmob','$varactive','$dt')";
				if(!mysqli_query($con,$sql))
				{
					die('error:'.mysqli_error($con));
				}

				else{
                $msg="Welcome $varnm <br/> Your Login id is: $varlid<br/> Your Password is : $varpass ";
				$obj1->email_send($varlid," Admin Login Password ",$msg);

				echo"1 record added";
		//		header("Location:login_admin.php");
				//mysqli_close($con);
			}
			}
			else
			{
				echo "<h3> $varlid in allready in use . Try another one !!!";
			}
}
?>

<div class="container-fluid" >

<div class="row"> 
<div class="col-sm-3">
</div>
<div class="col-sm-6" style="background-color:#eadaec"  >

<h1>Admin Login</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<div class="form-group">
<label for="txtname">Admin Name</label>
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter Admin Name" required="required">
</div>

<div class="form-group">
<label for="txtid">Login id</label>
<input type="email" class="form-control" id="txtid" name="txtid" placeholder="abc@xyz.com" onblur="checkid(this.value)" required>

<span id="sdiv"></span>
</div>
<div class="form-group">
<label for="txtpass">Password</label>
<!-- <input type="password" class="form-control" data-toggle="password" id="txtpass" name="txtpass" placeholder="Enter Password"> -->

<small class="text-muted"> Your System generated password will be send to your Given Login Id</small>
</div>
<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" id="image" name="img1">
</div>
<div class="form-group">
<label for="num">mobile no.</label>
<input type="number" class="form-control" id="num" name="num" placeholder="9876543210">
</div>

<fieldset class="form-group">
<legend>Active</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1">Yes</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="0" checked>No</label>
</div>
</fieldset>
<div >

<div class="row">
<div class="col-sm-2">
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>	</div>
<div class="col-sm-6"> Already registered? <br>
<a href="admin_signin.php"> Sign in</a> </div>
</div>
<div class="row">
<br>
</div>
</div>

</form></div>
</div>
</div>
</div>
</body>
</html>