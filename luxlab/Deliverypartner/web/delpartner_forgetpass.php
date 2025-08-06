<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Delivery Partner Creation</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php
session_start();
include 'function.php';
include 'newconnection.php';
$obj1= new utilfunction();  // creating class object 
 $varlid="";
   
if(isset ($_POST['btn1']))
{
$varlid=$_POST['txtid'];
$varpass= $obj1->random_password();// generating random password
$varpass1= $obj1->encrypt($varpass);

$sqlchk="SELECT * FROM tab_deliverypartner where login_id='".$varlid."'";
          $result=mysqli_query($con,$sqlchk);
          $rowcount= mysqli_num_rows($result);
          if($rowcount!=0)
            {
$sqlupdate="update tab_deliverypartner set password='$varpass1' where login_id='".$varlid."'";
           mysqli_query($con,$sqlupdate);
              echo "Password Reset  successfully.";
				if(!mysqli_query($con, $sqlupdate))
				{
					die('error:'.mysqli_error($con));
				}
				else
				{

	$msg="Hi<br/> Your Login id is: $varlid<br/> Your new Password is : $varpass ";
$obj1->email_send($varlid," deliverypartner Login Password ",$msg);
				}
				
			}
			else
			{
	echo "<h3> $varlid does not exists  . Try another one !!! </h3>";
			}
}
?>

<div class="container-fluid" >


	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="border border-dark m-4 p-4 sm-6 style">
	<form id="f1" name="f1" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="row mb-3">
		
		<label for="example-password-input" class="col-sm-12 col-form-label s2">Your Login Id</label>
					</div>
		<div class="row mb-3">
			<div class="col-sm-12">
<input type="text" name="txtid" class="form-control" />
							<i class="fa fa-user "></i>
						</div>
					</div>
					
					<div class="row mb-3">
						<div class="col-sm-12">
<button type="submit" class="btn btn-primary col-sm-6 s1 s2" name="btn1" style="height: 110%;width:40%; margin-left: 140px;">Reset Password</button>
						</div>
					</div>	
				</form>	
			</div>
		</div>
	</div>
</div>
</body>
</html>